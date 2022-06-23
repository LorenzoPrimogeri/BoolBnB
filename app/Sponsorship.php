<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public $timestamps = false;
    protected $fillable = ['type', 'price', 'duration'];
    public function apartaments()
    {
        return $this->belongsToMany('App\Apartment');
    }
}
