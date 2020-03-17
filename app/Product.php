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

    function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'image_product')->orderBy('position'); 
    }
}