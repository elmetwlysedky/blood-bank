<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    protected $city;
    public function __construct(City $pram)
    {
        $this->city = $pram;
    }

    public function all()
    {
        $city = City::all();
        return $city;

    }

    public function get_pluck()
    {
        $city = City::pluck('name_ar','id');
        return $city;

    }
}
