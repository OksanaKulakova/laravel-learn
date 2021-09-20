<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function carsPictures()
    {
        return $this->morphedByMany(Car::class, 'imagegable');
    }

    public function banner()
    {
        return $this->hasOne(Banner::class);
    }

}
