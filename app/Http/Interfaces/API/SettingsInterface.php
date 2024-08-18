<?php

namespace App\Http\Interfaces\API;

interface SettingsInterface
{
    Public function about_us();

    public function social();

    public function notification($request);

}
