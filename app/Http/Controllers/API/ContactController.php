<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\ContactRepository;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    use JsonResponseTrait;
    protected $contactRepository;

    public function __construct(ContactRepository $param)
    {
        $this->contactRepository = $param;
    }

    public function store(ContactRequest $request)
    {
        $user = Auth::guard('sanctum')->user();
        $validate = $request->validated();
        $validate['client_id']=$user->id;
        $data = $this->contactRepository->store($request);
        $this->jsonSuccess($data, 'send message successfully');

    }
}
