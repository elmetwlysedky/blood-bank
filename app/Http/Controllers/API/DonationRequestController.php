<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\DonationRequestRepository;
use App\Http\Requests\DonationRequest;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    use JsonResponseTrait;

    protected $DonationRequestRepository;

    public function __construct(DonationRequestRepository $param)
    {
        $this->DonationRequestRepository=$param;
    }

    public function create(DonationRequest $request)
    {
        $data = $request->validated();
        $donationRequest = $this->DonationRequestRepository->create($data );
    //     $clientIds = $this->DonationRequestRepository->getNotifiableClients($donationRequest);
    //     $notification_data=[
    //         'title' => 'حاله تبرع متاحة ',
    //         'content' => $donationRequest->bloodType->name .'حالة  تبرع  تحتاج فصيله دم ',
    //         'donation_request_id' => $donationRequest->id];
    //     $notification = $this->notificationRepo->create($notification_data);
    //    $data = $this->DonationRequestRepository->create($request );

       return $this->jsonSuccess([$data]);
    }


    public function all(Request $request)
    {
        $data = $this->DonationRequestRepository->all($request);
        return $this->jsonSuccess($data);
    }
}
