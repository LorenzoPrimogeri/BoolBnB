<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{

    protected $fillable=['date'];
    public function apartments()
    {
        return $this->belongsTo('App\Apartment');
    }
}
