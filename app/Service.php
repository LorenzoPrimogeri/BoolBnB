<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = ['name', 'slug'];
    public function apartaments()
    {
        return $this->belongsToMany('App\Apartment');
    }
}
