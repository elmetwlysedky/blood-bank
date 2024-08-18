<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\AuthInterface;
use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthRepository implements AuthInterface
{

    public function register($request)
    {

        $data = $request->validated();
        $data['password']= bcrypt($request->password);

        return  Client::create($data);


    }

    public function login($request)
    {
        $credentials=$request->validated();

        if (Auth::guard('api')->attempt($credentials)) {
            return Auth::guard('api')->user();

        }
    }


    public function logout($request)
    {
        if($request->user()->tokens()) {
            $request->user()->currentAccessToken()->delete();
        }
    }

    public function sendResetLinkEmail($request)
    {
        $request->validated();

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            $pin_code = rand(10000, 99999);
            $client->update(['pin_code' => $pin_code]);

            // send email or message here

            return $pin_code;

        }

    }


    public function reset_password($request)
    {

        $request->validated();
        $client = Client::where('pin_code', $request->pin_code)
            ->where('phone', $request->phone)->first();

        if ($client) {
            $client->password = Hash::make($request->password);
            $client->save();
            return $client;
        }

    }

    public function edit()
    {
        $data = Auth::guard('sanctum')->user();
        return $data ;
    }


    public function update($request)
    {
        $client = Auth::guard('sanctum')->user();
        $validate = $request->validated();
        $validate['password'] = Hash::make($request->password);

        $client->update($validate);
        return $client;
    }

}
