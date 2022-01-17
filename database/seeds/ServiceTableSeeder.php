<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Service::create([
            'name' => 'MOT',
            'image' => 'services-images/1598004326-mot.svg',
        ]);
        \App\Service::create([
            'name' => 'Servicing',
            'image' => 'services-images/1598004372-servicing.svg',
        ]);
        \App\Service::create([
            'name' => 'Repairs',
            'image' => 'services-images/1598004385-repairs.svg',
        ]);
        \App\Service::create([
            'name' => 'Tyres',
            'image' => 'services-images/1598004401-tyres.svg',
        ]);
        \App\Service::create([
            'name' => 'Bodywork',
            'image' => 'services-images/1598004420-bodywork.svg',
        ]);
        \App\Service::create([
            'name' => 'Electrical',
            'image' => 'services-images/1598004430-electrical.svg',
        ]);
        \App\Service::create([
            'name' => 'Recovery',
            'image' => 'services-images/1598004438-recovery.svg',
        ]);
    }
}
