<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ManufacturerFactory;
use App\Models\Manufacturer;

class ManufactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manufacturer::factory()->count(15)->create();
    }
}
