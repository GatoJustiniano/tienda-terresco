<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Instancia de Faker

        Product::create([
            'code' => '348593',
            'name' => 'Taladro eléctrico',
            'description' => $faker->realText(360),
            'price' => $faker->randomFloat(2, 50, 500),
            'stock_quantity' => 100,
            'category_id' => 1,
            'brand_id' => 1
        ]);

        Product::create([
            'code' => '349834',
            'name' => 'Destornillador multipunta',
            'description' => $faker->realText(360),
            'price' => $faker->randomFloat(2, 10, 70),
            'stock_quantity' => 100,
            'category_id' => 1,
            'brand_id' => 2
        ]);

        Product::create([
            'code' => '2938473',
            'name' => 'Llave inglesa',
            'description' => $faker->realText(360),
            'price' => $faker->randomFloat(2, 50, 500),
            'stock_quantity' => 100,
            'category_id' => 6,
            'brand_id' => 3
        ]);

        Product::create([
            'code' => '3498534',
            'name' => 'Martillo de carpintero',
            'description' => $faker->realText(360),
            'price' => $faker->randomFloat(2, 1, 50),
            'stock_quantity' => 100,
            'category_id' => 5,
            'brand_id' => 4
        ]);

        Product::create([
            'code' => '348573',
            'name' => 'Cinta métrica',
            'description' => $faker->realText(360),
            'price' => $faker->randomFloat(2, 4, 100),
            'stock_quantity' => 100,
            'category_id' => 6,
            'brand_id' => 5
        ]);

        Product::create([
            'code' => '293823',
            'name' => 'Tornillos galvanizados',
            'description' => $faker->realText(360),
            'price' => $faker->randomFloat(2, 1, 30),
            'stock_quantity' => 100,
            'category_id' => 5,
            'brand_id' => 6
        ]);
    }
}
