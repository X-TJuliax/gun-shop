<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessorySeeder extends Seeder
{
    public function run()
    {
        DB::table('accessories')->insert([
            [
                'brand' => 'BANISH', // Add the missing brand
                'description' => 'A handgun silencer can reduce the noise',
                'image' => 'silencer.jpg',
                'name' => 'Silencer',
                'price' => 199.99
            ],
            [
                'brand' => 'Thunder', // Make sure each entry has a brand
                'description' => 'Can significantly reduce the recoil',
                'image' => 'compensator.jpg',
                'name' => 'Compensator',
                'price' => 299.99
            ]
        ]);
    }
}