<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'price',
        'old_price',
        'car_body_id',
    ];

    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function carBody()
    {
        return $this->belongsTo(CarBody::class);
    }

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function pictures()
    {
        return $this->morphToMany(Image::class, 'imagegable');
    }
}
