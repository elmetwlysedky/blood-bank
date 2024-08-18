<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\API\CityRepository;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;

class CityController extends Controller
{

    use JsonResponseTrait;
    protected $cityRepository;

    public function __construct(CityRepository $param)
    {
        $this->cityRepository=$param;
    }

    public function all()
    {
        $data = $this->cityRepository->all();
        return $this->jsonSuccess($data);
    }
}
