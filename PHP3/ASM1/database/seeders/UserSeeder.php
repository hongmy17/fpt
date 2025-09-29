<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
                "is_admin" => "1",
                "password" => Hash::make("12345678"),
                "email_verified_at" => Carbon::now(),
                "remember_token" => Str::random(10),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "Nguyen Van A",
                "email" => "a@example.com",
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "email_verified_at" => Carbon::now(),
                "remember_token" => Str::random(10),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "Tran Thi B",
                "email" => "b@example.com",
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "email_verified_at" => Carbon::now(),
                "remember_token" => Str::random(10),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "Le Van C",
                "email" => "c@example.com",
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "email_verified_at" => Carbon::now(),
                "remember_token" => Str::random(10),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "Pham Thi D",
                "email" => "d@example.com",
                "is_admin" => "0",
                "password" => Hash::make("password"),
                "email_verified_at" => Carbon::now(),
                "remember_token" => Str::random(10),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
