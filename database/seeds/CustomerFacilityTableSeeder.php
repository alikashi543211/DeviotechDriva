<?php

use Illuminate\Database\Seeder;

class CustomerFacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CustomerFacility::create([
            'name' => 'Waiting Area',
            'image' => 'customer_facility-images/1598005226-waiting_area.svg',
        ]);
        \App\CustomerFacility::create([
            'name' => 'Viewing Area',
            'image' => 'customer_facility-images/1598005234-viewing_area.svg',
        ]);
        \App\CustomerFacility::create([
            'name' => 'WiFi',
            'image' => 'customer_facility-images/1598005242-wifi.svg',
        ]);
        \App\CustomerFacility::create([
            'name' => 'Restrooms',
            'image' => 'customer_facility-images/1598005249-restrooms.svg',
        ]);
        \App\CustomerFacility::create([
            'name' => 'Refreshments',
            'image' => 'customer_facility-images/1598005323-refreshments.svg',
        ]);
    }
}
