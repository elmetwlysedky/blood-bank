<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\API\AuthRepository;
use App\Http\Repositories\API\BloodTypeRepository;
use App\Http\Repositories\API\CityRepository;
use App\Http\Repositories\API\GovernorateRepository;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendEmailRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $authRepository;
    protected $city;
    protected $governorate;
    protected $bloodType;


    public function __construct(
        AuthRepository $param,
        CityRepository $city,
        GovernorateRepository $governorate,
        BloodTypeRepository $bloodType
        )
    {
        $this->authRepository=$param;
        $this->city=$city;
        $this->governorate=$governorate;
        $this->bloodType=$bloodType;

    }



    public function create()
    {
        return view('Site.Auth.register',[
          'cities' => $this->city->all(),
          'governorates' => $this->governorate->all(),
          'blood_type' => $this->bloodType->all()

        ]);

    }


    public function get_login()
    {
        return view('Site.Auth.login');

    }


    public function register(ClientRequest $request)
    {
        $user =$this->authRepository->register($request);
        // $request->authenticate();
        // $request->session()->regenerate();

        event(new Registered($user));

        Auth::login($user);

        return view('Site.index');

    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::guard('site')->attempt($credentials)) {

            Auth::guard('site')->user();
            return to_route('site.home');
        }

         return back()->withErrors(['email' => 'These credentials do not match our records.']);

    }

    public function logout()
    {
        Auth::guard('site')->logout();
        return to_route('site.login');

    }

    public function sendResetLinkEmail(SendEmailRequest $request)
    {
        $data = $this->authRepository->sendResetLinkEmail($request);
        if($data) {
            return $this->jsonSuccess($data);
        } else {
            return $this->jsonFailed([null ,'this phone is not define']);
        }
    }

    public function reset_password(ResetPasswordRequest $request)
    {
        $data = $this->authRepository->reset_password($request);
        if ($data) {
            return $this->jsonSuccess();
        } else {
            return $this->jsonFailed();
        }
    }

    public function edit()
    {
        $data = $this->authRepository->edit();
        return $this->jsonSuccess($data);

    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $this->authRepository->update($request);
        return $this->jsonSuccess($data, 'update profile successfully');
    }

}
