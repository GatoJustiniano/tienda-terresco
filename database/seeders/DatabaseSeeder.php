<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alvaro',
            'email' => 'andres@gmail.com',
            'role' => 'administrador',
            'password' => Hash::make('admin5095')
        ]);
        User::factory()->create([
            'name' => 'Vendedor',
            'email' => 'vendedor@gmail.com',
            'role' => 'vendedor',
            'password' => Hash::make('vendedor')
        ]);

        $this->call([
            MenuSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);        
    }
}
