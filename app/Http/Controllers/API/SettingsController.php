<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\SettingsRepository;
use App\Http\Requests\SettingNotificationRequest;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    use JsonResponseTrait;

    protected $settingRepository;

    public function __construct(SettingsRepository $param)
    {
        $this->settingRepository=$param;
    }

    public function about_us()
    {
        $data = $this->settingRepository->about_us();
        return $this->jsonSuccess($data);

    }

    public function social()
    {
        $data = $this->settingRepository->social();
        return $this->jsonSuccess($data);
    }

    public function notification(SettingNotificationRequest $request)
    {
        $data = $this->settingRepository->notification($request);
        return $this->jsonSuccess($data);
    }

    public function test()
    {
        //        $data = Client::with('bloodTypes')->get();
        //        $donationRequest = DonationRequest::where('id',5);
        //
        //        $clientsIds = $donationRequest->city->governorate->clients();



        $donationRequest =DonationRequest::where('city_id', 5)->get()->first();
        $governorateId =$donationRequest->city->governorate->id;
        $bloodTypeId = $donationRequest->bloodType->id;


        $clients = Client::with('governorates', 'bloodTypes')->
            when($governorateId, function ($query) use ($governorateId) {
                $query->wherehas('governorates', function ($query) use ($governorateId) {
                    $query->where('governorate_id', $governorateId);
                });

            })->when($bloodTypeId, function ($query) use ($bloodTypeId) {
                $query->wherehas('bloodTypes', function ($query) use ($bloodTypeId) {
                    $query->where('blood_type_id', $bloodTypeId);
                });
            })->get();


        return $this->jsonSuccess($clients);
    }
}
