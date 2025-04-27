<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        Booking::create([
            'package_id' => 1,
            'customer_name' => 'علی رضایی',
            'customer_email' => 'ali@example.com',
            'travel_date' => Carbon::create(2025, 5, 1),
            'created_at' => Carbon::now()
        ]);
        Booking::create([
            'package_id' => 1,
            'customer_name' => 'زهرا احمدی',
            'customer_email' => 'zahra@example.com',
            'travel_date' => Carbon::create(2025, 6, 10),
        ]);
        Booking::create([
            'package_id' => 1,
            'customer_name' => 'سیاوش قمیشی',
            'customer_email' => 'siavashGh@example.com',
            'travel_date' => Carbon::create(2025, 6, 11),
        ]);
    }
}
