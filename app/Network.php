<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Network extends Model
{
    use Notifiable;

    protected $table = 'networks';
    protected $fillable = [
        'description'
    ];

    function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function contact()
    {
        return $this->hasOne('App\Contact');
    }
}