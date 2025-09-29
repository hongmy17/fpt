<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class, 
            CategorySeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            PostSeeder::class,
        ]);
    }
}
