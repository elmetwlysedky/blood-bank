<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\GovernorateRepositoryInterface;
use App\Models\Governorate;
use App\Traits\JsonResponseTrait;

class GovernorateRepository implements GovernorateRepositoryInterface
{


    protected $governorate;
    public function __construct(Governorate $pram)
    {
        $this->governorate = $pram;
    }

    public function all()
    {
        $governorate = Governorate::all();
        return $governorate;

    }

    public function get_pluck()
    {
        $governorate = Governorate::pluck('name_ar','id');
        return $governorate;

    }
}
