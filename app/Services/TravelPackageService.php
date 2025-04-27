<?php

namespace App\Services;

use App\Models\TravelPackage;

class TravelPackageService
{

    public function getFormattedPackages()
    {
        $packages = TravelPackage::with(['bookings:id,package_id,customer_name,customer_email'])
            ->withCount('bookings')
            ->get();
        
        return $this->formatPackageList($packages);
    }

    protected function formatPackageList($packages)
    {
        return $packages->map(function ($package) {
            return [
                'id' => $package->id,
                'name' => $package->name,
                'price' => $package->price,
                'location' => $package->location,
                'total_bookings' => $package->bookings_count,
                'customers' => $package->bookings->map(function ($booking) {
                    return [
                        'customer_name' => $booking->customer_name,
                        'customer_email' => $booking->customer_email,
                    ];
                }),
            ];
        });
    }
}
