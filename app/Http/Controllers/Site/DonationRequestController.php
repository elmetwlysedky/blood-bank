<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\DonationRequestRepository;
use App\Http\Requests\DonationRequest;
use App\Models\Blood_type;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DonationRequestController extends Controller
{

    protected $DonationRequestRepository;

    public function __construct(DonationRequestRepository $param)
    {
        $this->DonationRequestRepository=$param;
    }

    public function index(Request $request) :view
    {
        return view('Site.donation_request', [
          'donations'  => $this->DonationRequestRepository->all($request),
          'governorates' =>Governorate::all(),
          'blood_types' => Blood_type::all()
        ]);

    }

    public function create() :view
    {
        return view('Site.create_donation', [
            'blood_types' => Blood_type::pluck('name', 'id'),
            'cities' => City::pluck('name_ar', 'id')
        ]);
    }


    public function store(DonationRequest $request)
    {
        $this->DonationRequestRepository->create($request);
    }


    public function show($id)
    {
        return view('Site.inside_request', [
           'donation'=> $this->DonationRequestRepository->show($id),
        ]);
    }
}
