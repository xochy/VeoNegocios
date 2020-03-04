<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'offered', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }   

    function Store()
    {
        return $this->belongsTo('App\Store');
    }
}