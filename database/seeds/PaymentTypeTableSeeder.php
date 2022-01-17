<?php

use Illuminate\Database\Seeder;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PaymentType::create([
            'name' => 'Cash',
            'image' => 'payment_type-images/1598005928-cash.svg',
        ]);
        \App\PaymentType::create([
            'name' => 'Credit Card',
            'image' => 'payment_type-images/1598005936-credit_card.svg',
        ]);
        \App\PaymentType::create([
            'name' => 'BACS',
            'image' => 'payment_type-images/1598005943-bacs.svg',
        ]);
        \App\PaymentType::create([
            'name' => 'Other',
            'image' => 'payment_type-images/1598005952-other.svg',
        ]);
    }
}
