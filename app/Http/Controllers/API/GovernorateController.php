<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\GovernorateRepository;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    use JsonResponseTrait;
    protected $governorateRepository;

    public function __construct(GovernorateRepository $param)
    {
        $this->governorateRepository = $param;
    }

    public function all()
    {
        $data = $this->governorateRepository->all();
        return $this->jsonSuccess($data);
    }
}
