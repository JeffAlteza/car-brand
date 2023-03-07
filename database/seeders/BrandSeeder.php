<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Toyota',
            'Volkswagen',
            'Hyundai',
            'General Motors',
            'Ford',
            'Honda',
            'Nissan',
            'Fiat',
            'Renault',
            'BMW'
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
