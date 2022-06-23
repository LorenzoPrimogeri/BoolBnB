<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Apartment extends Model
{
    protected $fillable = ['title', 'room', 'bed', 'bathroom', 'mq', 'address', 'lat', 'lng', 'img', 'slug', 'visible', 'price', 'description'];
    public static function convertToSlug($title)
    {
        $slug = Str::slug($title);
        $alternateslug = $slug;
        $postexist = Apartment::where('slug', $slug)->first();
        $counter = 1;
        while ($postexist) {
            $alternateslug = $slug . '_' . $counter;
            $counter++;
            $postexist = Apartment::where('slug', $alternateslug)->first();
        }
        return $alternateslug;
    }
}
