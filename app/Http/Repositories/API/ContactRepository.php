<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\ContactInterface;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactRepository implements ContactInterface
{

    public function store($request)
    {
         Contact::create($request);

    }
}
