<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    protected $fillable =['title','content','donation_request_id'];
    
    public $timestamps = true;

    public function donationRequest()
    {
        return $this->belongsTo(DonationRequest::class);
    }

    public function client()
    {
        return $this->belongsToMany(Client::class)->withPivot('is_read');
    }

}
