<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(EnquiryTableSeeder::class);
        $this->call(CustomerFacilityTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
    }
}
