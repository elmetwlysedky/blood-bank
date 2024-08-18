<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\SettingsRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    protected $setting;


    public function __construct(SettingsRepository $setting)
    {
        $this->setting= $setting;
    }

    public function social()
    {
        $this->setting->social();

    }
}
