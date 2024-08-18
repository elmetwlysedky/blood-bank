<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\SettingsInterface;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingsRepository implements SettingsInterface
{

    public function about_us()
    {
        $data = Setting::where('key', 'aboute')->get();
        return $data;
    }

    public function social()
    {
        $data = Setting::where('key', 'facebook')
            ->orWhere('key', 'twitter')
            ->orWhere('key', 'instagram')
            ->orWhere('key', 'youtube')
            ->orWhere('key', 'phone')
            ->orWhere('key', 'email')
            ->get();
        return $data;
    }

    public function notification($request)
    {
        $data = $request->validated();
        $user = Auth::guard('sanctum')->user();
        $governorates = $data['governorate_id'];
        $blood_types = $data['blood_type_id'];

        if($blood_types) {
            $user->bloodTypes()->sync($blood_types);
        }
        if($governorates) {
            $user->governorates()->sync($governorates);
        }
        return [$governorates,$blood_types];
    }
}
