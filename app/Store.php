<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = ['name', 'description', 'score', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'image_store')->orderBy('position'); 
    }

    public function hasTittleCoverImage($position)
    {        
        if($this->hasCoverImage($position)){
            
            $image = $this->images->where('position', $position)->first();

            if($image->tittle != null){                
                return true;
            }
        }
        return false;
    }

    public function hasDescriptionCoverImage($position)
    {        
        if($this->hasCoverImage($position)){
            
            $image = $this->images->where('position', $position)->first();

            if($image->description != null){                
                return true;
            }
        }
        return false;
    }

    public function hasCoverImage($position)
    {        
        if($this->images()->where('position', $position)->first()){
            return true;
        }
        return false;
    }
}