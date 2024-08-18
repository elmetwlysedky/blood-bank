<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\ClientInterface;
use App\Models\Client;
use App\Models\City;
use App\Models\Blood_type;

class ClientRepository implements ClientInterface
{
    protected $client;
    public function __construct(Client $pram)
    {
        $this->client = $pram;
    }

    public function all()
    {
        $data = Client::latest()->paginate(10);
        return $data;

    }

    public function show($id)
    {

        $data = Client::findOrFail($id);
        return $data;

    }

    public function active($request, $id)
    {

        $status = Client::findOrFail($id);


        $validatedData = $request->validate([
            'is_active' => 'required|boolean'
        ]);
        $status->is_active = $validatedData['is_active'];
        $status->save();
    }

    public function delete($id)
    {

        $data = Client::destroy($id);
        return $data;
    }

}
