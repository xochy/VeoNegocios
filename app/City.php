<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class City extends Model
{   
    protected $table = 'cities';
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'image_city')->orderBy('position'); 
    }
}