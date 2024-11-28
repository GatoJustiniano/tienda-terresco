<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Herramientas manuales'
        ]);
        Category::create([
            'name' => 'Pinturas y accesorios'
        ]);
        Category::create([
            'name' => 'Adhesivos y selladores'
        ]);
        Category::create([
            'name' => 'Jardineria y Exteriores'
        ]);
        Category::create([
            'name' => 'Materiales de construccion'
        ]);
        Category::create([
            'name' => 'Tuberías y fontaneria'
        ]);
    }
}
