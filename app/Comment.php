<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    protected $table = 'comments';
    protected $fillable = [
        'description',
        'score'
    ];

    function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}