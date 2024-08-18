<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\API\AuthInterface;
use App\Http\Repositories\API\AuthRepository;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendEmailRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Token;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use JsonResponseTrait;
    protected $authRepository;

    public function __construct(AuthRepository $param)
    {
        $this->authRepository=$param;
    }
    public function register(ClientRequest $request)
    {
        $data =$this->authRepository->register($request);
        $token = $data->createToken('authToken')->plainTextToken;

        $fcmToken = $request->fcm_token;
        Token::create([
            'client_id' => $data->id,
            'token' => $fcmToken,
        ]);

        return $this->jsonSuccess([$data,'token'=>$token]);
    }

    public function login(LoginRequest $request)
    {
        $data= $this->authRepository->login($request);
        if($data){
            $token = $data->createToken('authToken')->plainTextToken;

            $fcmToken = $request->fcm_token;
            Token::create([
                'client_id' => $data->id,
                'token' => $fcmToken,
            ]);

           
            return $this->jsonSuccess([$data,'token'=>$token]);
        }
        dd('error');

    }

    public function logout(Request $request)
    {
        $this->authRepository->logout($request);
        return $this->jsonSuccess('', 'logout successfly');

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
