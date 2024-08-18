<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'city_id');
    }

    public function donationRequest()
    {
        return $this->hasMany(DonationRequest::class, 'city_id');
    }

}
