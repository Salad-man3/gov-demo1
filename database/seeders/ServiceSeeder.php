<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            # code...
            // Service::create([
            //     "name" => "name $i",
            //     "description" => "description $i",
            // ]);
            $this->call([
                ServiceSeeder::class,
            ]);
        }
    }
}
