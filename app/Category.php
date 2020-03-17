<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;
    
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function stores()
    {
        return $this->hasMany('App\Store');
    }
    
    public function images()
    {
        return $this->belongsToMany('App\Image', 'image_category')->orderBy('position'); 
    }

    public function hasImages(){
    
        return (bool) $this->images()->first();
    }
}