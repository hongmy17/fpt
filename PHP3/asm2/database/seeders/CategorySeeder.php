<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Cà phê',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Máy móc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dụng cụ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
