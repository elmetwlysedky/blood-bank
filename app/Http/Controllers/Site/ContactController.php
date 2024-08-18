<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\ContactRepository;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    protected $contactRepository;

    public function __construct(ContactRepository $param)
    {
        $this->contactRepository = $param;
    }


    public function create()
    {
        return view('Site.contact');

    }

    public function store(ContactRequest $request)
    {

         $validate = $request->validated();

        $this->contactRepository->store($validate);

        return redirect()->back();
    }
}
