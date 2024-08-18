<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    use HasFactory;

    public $timestamps = true;

    protected $fillable =[
        'name',
        'phone',
        'age',
        'bags',
        'details',
        'hospital_name',
        'hospital_address',
        'latitude',
        'longitude',
        'blood_type_id',
        'city_id',
        'client_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(Blood_type::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class, 'donation_request_id');
    }

}
