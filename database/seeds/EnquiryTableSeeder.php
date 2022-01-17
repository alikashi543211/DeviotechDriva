<?php

use Illuminate\Database\Seeder;

class EnquiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\EnquiryType::create([
            'name' => 'General'
        ]);
        \App\EnquiryType::create([
            'name' => 'Account'
        ]);
    }
}
