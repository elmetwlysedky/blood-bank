<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\DonationRequestRepository;
use App\Http\Repositories\API\BloodTypeRepository;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{


    protected $donationRepository , $bloodType;


    public function __construct(
        DonationRequestRepository $donationRepository,
        BloodTypeRepository $bloodType)
    {

        $this->donationRepository=$donationRepository;
        $this->bloodType=$bloodType;
    }


    public function index(Request $request)
    {

        return view('Dashboard.DonationRequest.index',[
            'donations' =>  $this->donationRepository->all($request)
        ]);

    }



    public function show($id)
    {
        return view('Dashboard.DonationRequest.show',[
            'donation_request' => $this->donationRepository->show($id)
        ]);
    }



    public function destroy($id)
    {
        $data = $this->donationRepository->delete($id);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
