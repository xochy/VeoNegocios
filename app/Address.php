<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Address extends Model
{
    use Notifiable;

    protected $table = 'addresses';
    protected $fillable = [
        'address_address', 
        'address_latitude', 
        'address_longitude',
        'reference',
        'schedule',
        'slug',
        'store_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function city()
    {
        return $this->hasOne('App\City');
    }

}