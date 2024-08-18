<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\API\UserRepository;


class UserController extends Controller
{



    protected $userRepository;


    public function __construct(UserRepository $userRepository,)
    {

        $this->userRepository=$userRepository;

    }




    public function index()
    {
        return view('Dashboard.User.index',[
           'users'=> User::all()
        ]);
    }


    public function create()
    {
        return view('Dashboard.User.create');
    }


    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] =Hash::make($request->password);

        $this->userRepository->store($data);
        
        session()->flash('success', __('main.added_success'));
        return to_route('user.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
