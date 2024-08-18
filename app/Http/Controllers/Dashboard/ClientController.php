<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\AuthRepository;
use App\Http\Repositories\API\ClientRepository;
use App\Http\Requests\ClientRequest;
use App\Models\Blood_type;
use App\Models\City;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $clientRepository;
    protected $authRepository;


    public function __construct(
        ClientRepository $clientRepository,
        AuthRepository $authRepository)
    {
        $this->clientRepository=$clientRepository;
        $this->authRepository=$authRepository;

    }


    public function index()
    {
        $data = $this->clientRepository->all();
        return view('Dashboard.Client.index',['clients'=>$data]);
    }



    public function show($id)
    {
        $data = $this->clientRepository->show($id);
        return view('Dashboard.Client.show',['client'=>$data]);
    }

    public function active(Request $request , $id)
    {
        $this->clientRepository->active($request,$id);
        return redirect()->back();
    }


    public function destroy($id)
    {
        $data = $this->clientRepository->delete($id);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }


   



}
