<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'package_id' => 1,
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->email,
            'travel_date' => Carbon::now()->addDays(rand(1, 30)),
            'created_at' => now(),
        ];
    }
}
