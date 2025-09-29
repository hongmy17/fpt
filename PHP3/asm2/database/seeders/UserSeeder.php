<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                "name" => "linh",
                "email" => "linhpqpc05353@fpt.edu.vn",
                'avatar' => 'person_1.jpg',
                "is_admin" => "1",
                "password" => Hash::make("12345678"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Nguyen Van A",
                "email" => "a@example.com",
                'avatar' => 'person_2.jpg',
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Tran Thi B",
                "email" => "b@example.com",
                'avatar' => 'person_3.jpg',
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Le Van C",
                "email" => "c@example.com",
                'avatar' => 'person_4.jpg',
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Pham Thi D",
                "email" => "d@example.com",
                'avatar' => 'person_5.jpg',
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
