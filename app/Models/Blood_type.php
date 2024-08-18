<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood_type extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;

    public function client()
    {
        return $this->hasMany(Client::class, 'blood_type_id');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function donationRequest()
    {
        return $this->hasMany(DonationRequest::class, 'blood_type_id');
    }

}
