<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    protected $user;
    public function __construct(User $pram)
    {
        $this->user = $pram;
    }

    public function all()
    {
        $data = User::latest()->paginate(10);
        return $data;

    }
    public function create()
    {



    }
    public function store($request)
    {
        $user = User::create($request);

    }


    public function show($id)
    {

        $data = User::findOrFail($id);
        return $data;

    }


    public function edit($id)
    {
        $data = User::findOrFail($id);
        return $data;
    }


    public function update($request , $id)
    {
        $data = User::findOrFail($id);

    }

    public function delete($id)
    {

        $data = User::destroy($id);
        return $data;
    }

}
