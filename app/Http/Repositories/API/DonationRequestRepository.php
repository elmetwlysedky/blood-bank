<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\DobationRequestInterface;
use App\Models\Client;
use App\Models\Token;
use App\Models\Notification;
use App\Models\DonationRequest;
use App\Traits\FcmTrait;

class DonationRequestRepository implements DobationRequestInterface
{
    use FcmTrait;

    public function create($request)
    {

        $donationRequest = DonationRequest::create($request);

        // sendnotification

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


        $notification_data=[
            'title' => 'حاله تبرع متاحة ',
            'content' => $donationRequest->bloodType->name .'حالة  تبرع  تحتاج فصيله دم ',
            'donation_request_id' => $donationRequest->id];

        $notification = Notification::create($notification_data);
        $notification->client()->attach($clients);

        $tokens = Token::whereHas('client', function ($query) use ($donationRequest) {
            $query->whereHas('governorates', function ($query) use ($donationRequest) {
                $query->where('governorate_id', $donationRequest->city->governorate_id);
            })->whereHas('bloodTypes', function ($query) use ($donationRequest) {
                $query->where('blood_type_id', $donationRequest->blood_type_id);
            });
        })->where('token', '!=', null)->pluck('token')->toArray();


        if (count($tokens)) {
            $title = $notification->title;
            $body = $notification->content;
            $data = [
                'donation_request_id' => $donationRequest->id
            ];
            $send = $this->notifyByFirebase($title, $body, $tokens, $data);
            info("firebase result: " . $send);

//             dd(env('FIREBASE_API_ACCESS_KEY'));
//            dd($send);
        }



        return [$donationRequest , $clients];
    }


    public function all($request)
    {
        $blood_type = $request->blood_type;
        $governorate = $request->governorate;


        $donation = DonationRequest::with(['city.governorate','bloodType'])
            ->when($governorate, function ($query) use ($governorate) {
                $query->whereHas('city.governorate', function ($query) use ($governorate) {
                    $query->where('id', $governorate);
                });
            })->when($blood_type, function ($query) use ($blood_type) {
                $query ->wherehas('bloodType', function ($query) use ($blood_type) {
                    $query->where('id', $blood_type);
                });

            })->latest()->paginate(10);
        return $donation;
    }

    public function show($id)
    {
        $data=DonationRequest::findOrFail($id);
        return $data;
    }


    public function delete($id)
    {

        $data = DonationRequest::destroy($id);
        return $data;
    }


}
