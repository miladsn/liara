<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['package_id', 'customer_name', 'customer_email', 'travel_date'];

    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class, 'package_id');
    }
}
