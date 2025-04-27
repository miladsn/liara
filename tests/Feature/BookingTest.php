<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\TravelPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_it_can_create_a_booking()
    {
        //m_sn: make test package. (please connect to test db )
        $package = TravelPackage::factory()->create();
        //test reservation data
        $bookingData = [
            'customer_name' => 'Ali Test',
            'customer_email' => 'ali@test.com',
            'travel_date' => now()->addDays(1)->toDateString(),
        ];
        //make reserve
        $response = $this->postJson("/api/packages/{$package->id}/bookings", $bookingData);

        //is created ? (201 status)
        $response->assertStatus(201);

        //is stored?
        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Ali Test',
            'customer_email' => 'ali@test.com',
            'package_id' => $package->id,
        ]);
    }
}
