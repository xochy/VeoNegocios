<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function network()
    {
        return $this->belongsTo('App\Network');
    }
}
