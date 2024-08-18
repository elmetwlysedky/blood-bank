<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens , Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city_id',
        'blood_type_id',
        'date_of_birth',
        'last_donation',
        'pin_code'
    ];

    public $timestamps = true;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(Blood_type::class);
    }

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

    public function bloodTypes()
    {
        return $this->belongsToMany(Blood_type::class);
    }

    public function donationRequest()
    {
        return $this->hasMany(DonationRequest::class, 'client_id');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'client_id');
    }

    public function notification()
    {
        return $this->belongsToMany(Notification::class)->withPivot('is_read');
    }

    public function governorates()
    {
        return $this->belongsToMany(Governorate::class);
    }

    public function findForPassport($username)
    {
        return $this->where('phone', $username)->first();
    }

}
