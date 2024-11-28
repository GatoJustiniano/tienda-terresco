<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
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

        $this->call([
            MenuSeeder::class,
        ]);        
    }
}
