<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            [
                'name'        => 'Điện thoại',
                'slug'        => Str::slug('Điện thoại'),
                'description' => 'Danh mục các loại điện thoại thông minh',
                'status'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Laptop',
                'slug'        => Str::slug('Laptop'),
                'description' => 'Máy tính xách tay phục vụ học tập và công việc',
                'status'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Phụ kiện',
                'slug'        => Str::slug('Phụ kiện'),
                'description' => 'Tai nghe, sạc, ốp lưng và các phụ kiện khác',
                'status'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
