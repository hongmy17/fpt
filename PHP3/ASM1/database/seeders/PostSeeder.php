<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('posts')->insert([
            [
                'user_id'       => 1,
                'title'         => 'Hướng dẫn sử dụng Laravel cơ bản',
                'slug'          => Str::slug('Hướng dẫn sử dụng Laravel cơ bản'),
                'content'       => 'Đây là nội dung bài viết hướng dẫn Laravel cơ bản dành cho người mới bắt đầu...',
                'excerpt'       => 'Tìm hiểu Laravel cơ bản từ A đến Z.',
                'is_published'  => 1,
                'published_at'  => $now->copy()->subDays(3),
                'created_at'    => $now->copy()->subDays(4),
                'updated_at'    => $now->copy()->subDays(3),
            ],
            [
                'user_id'       => 2,
                'title'         => 'Tại sao nên dùng Laravel cho dự án web?',
                'slug'          => Str::slug('Tại sao nên dùng Laravel cho dự án web?'),
                'content'       => 'Laravel mang lại rất nhiều lợi ích trong việc phát triển web như cú pháp rõ ràng, cộng đồng lớn...',
                'excerpt'       => 'Ưu điểm khi sử dụng Laravel trong lập trình web.',
                'is_published'  => 1,
                'published_at'  => $now->copy()->subDays(2),
                'created_at'    => $now->copy()->subDays(3),
                'updated_at'    => $now->copy()->subDays(2),
            ],
            [
                'user_id'       => 1,
                'title'         => 'Laravel vs Symfony: Framework nào phù hợp?',
                'slug'          => Str::slug('Laravel vs Symfony: Framework nào phù hợp?'),
                'content'       => 'Bài viết so sánh hai framework PHP phổ biến: Laravel và Symfony về hiệu năng, cộng đồng, tài liệu...',
                'excerpt'       => 'So sánh Laravel và Symfony chi tiết.',
                'is_published'  => 0,
                'published_at'  => null,
                'created_at'    => $now->copy()->subDay(),
                'updated_at'    => $now->copy()->subDay(),
            ],
        ]);
    }
}
