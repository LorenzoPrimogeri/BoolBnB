<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['email', 'object', 'body'];
    public function apartments()
    {
        return $this->belongsTo('App\Apartment');
    }
}
