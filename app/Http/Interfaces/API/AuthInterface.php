<?php

namespace App\Http\Interfaces\API;

interface AuthInterface
{

    public function register(array $request);
    public function login($request);
    public function logout($request);
    public function sendResetLinkEmail($request);
    public function reset_password($request);

    public function edit();
    public function update($request);
}