<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_type';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
    public function donationrequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function no_clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
