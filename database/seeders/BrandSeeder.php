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
        Brand::create([
            'name' => 'Bosch'
        ]);
        Brand::create([
            'name' => 'Makita '
        ]);
        Brand::create([
            'name' => 'DeWalt'
        ]);
        Brand::create([
            'name' => 'Stanley '
        ]);
        Brand::create([
            'name' => 'Craftsman '
        ]);
        Brand::create([
            'name' => 'Truper '
        ]);
    }
}
