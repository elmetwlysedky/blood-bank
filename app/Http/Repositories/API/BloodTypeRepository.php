<?php

namespace App\Http\Repositories\API;

use App\Http\Interfaces\API\BloodTypeInterface;
use App\Models\Blood_type;


class BloodTypeRepository implements BloodTypeInterface
{
    protected $blood_type;
    public function __construct(Blood_type $blood_type)
    {
        $this->blood_type = $blood_type;
    }

    public function all()
    {
        $Data = Blood_type::all();
        return $Data;

    }

    public function get_pluck()
    {
        $data = Blood_type::pluck('name','id');
        return $data;
    }
}
