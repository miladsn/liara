<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\TravelPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TravelPackageTest extends TestCase
{

    public function it_can_create_a_travel_package()
    {
        //package data
        $data = [
            'name' => 'Tour to Paris',
            'price' => 2000,
            'location' => 'Paris, France',
        ];

        //send request
        $response = $this->postJson('/api/travel-packages', $data);
        //is created ?
        $response->assertStatus(201);

        //data base hase  this data ?
        $this->assertDatabaseHas('travel_packages', [
            'name' => 'Tour to Paris',
            'price' => 2000,
            'location' => 'Paris, France',
        ]);
    }

    public function test_it_can_get_packages_with_bookings_and_customers()
    {
        //create a new package
        $package = TravelPackage::factory()->create();

        //create a new reserve 1
        $booking1 = Booking::factory()->create([
            'package_id' => $package->id,
            'customer_name' => 'Ali Rezaei',
            'customer_email' => 'ali.rezaei@example.com',
        ]);
        //create a new reserve 2
        $booking2 = Booking::factory()->create([
            'package_id' => $package->id,
            'customer_name' => 'Zahra Ahmadi',
            'customer_email' => 'zahra.ahmadi@example.com',
        ]);

        //send get api
        $response = $this->getJson('/api/travel-packages');

        // is 200
        $response->assertStatus(200);

        //is existed id and name ?
        $response->assertJsonFragment([
            'id' => $package->id,
            'name' => $package->name,
        ]);

        //exist customer_name of reserves  in response packages
        $response->assertJsonFragment([
            'customer_name' => $booking1->customer_name,
        ]);

        $response->assertJsonFragment([
            'customer_name' => $booking2->customer_name,
        ]);
    }
}
