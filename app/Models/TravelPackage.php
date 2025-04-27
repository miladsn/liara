<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelPackage extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['name', 'price', 'location'];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }

}
