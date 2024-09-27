<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'CZ 75', 'price' => 499.99, 'description' => 'A famous gun with good reputation.', 'image' => 'handgun.jpg', 'brand' => 'ČZUB'],
            ['name' => 'AWM', 'price' => 999.99, 'description' => 'A powerful shotgun with good reputation.', 'image' => 'shotgun.jpg', 'brand' => 'Accuracy International'],
        ]);
    }
}
