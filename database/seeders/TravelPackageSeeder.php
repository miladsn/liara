<?php

namespace Database\Seeders;

use App\Models\TravelPackage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //has id =1 ? for booking seeder
        $package = TravelPackage::find(1);

        if (!$package) {
            TravelPackage::create([
                'id' => 1,
                'name' => 'تور استانبول',
                'price' => 1200.00,
                'location' => 'ترکیه',
            ]);
        }
//other packages
        TravelPackage::create([
            'name' => 'تور مشهد',
            'price' => 500.00,
            'location' => 'ایران',
        ]);

        TravelPackage::create([
            'name' => 'تور کیش',
            'price' => 700.00,
            'location' => 'ایران',
        ]);
    }
}
