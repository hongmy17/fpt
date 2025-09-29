<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('products')->insert([
            [
                'title'        => 'iPhone 15 Pro Max',
                'slug'         => Str::slug('iPhone 15 Pro Max'),
                'description'  => 'Điện thoại cao cấp nhất của Apple với chip A17 Bionic.',
                'content'      => 'Chi tiết iPhone 15 Pro Max với camera mới, hiệu năng vượt trội, thiết kế titan.',
                'price'        => 33990000,
                'sale_price'   => 32990000,
                'thumbnail'    => 'iphone15promax.jpg',
                'status'       => 'published',
                'category_id'  => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'MacBook Air M2',
                'slug'         => Str::slug('MacBook Air M2'),
                'description'  => 'Laptop mỏng nhẹ, mạnh mẽ với chip Apple M2.',
                'content'      => 'MacBook Air M2 phù hợp cho lập trình viên, sinh viên và dân văn phòng.',
                'price'        => 28990000,
                'sale_price'   => 27990000,
                'thumbnail'    => 'macbookairm2.jpg',
                'status'       => 'published',
                'category_id'  => 2,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'Tai nghe AirPods Pro',
                'slug'         => Str::slug('Tai nghe AirPods Pro'),
                'description'  => 'Tai nghe không dây chống ồn chủ động từ Apple.',
                'content'      => 'AirPods Pro có khả năng chống ồn chủ động, âm thanh sống động và thời lượng pin dài.',
                'price'        => 6990000,
                'sale_price'   => 6490000,
                'thumbnail'    => 'airpodspro.jpg',
                'status'       => 'published',
                'category_id'  => 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'iPad Pro M4',
                'slug'         => Str::slug('iPad Pro M4'),
                'description'  => 'Máy tính bảng cao cấp với chip Apple M4 mạnh mẽ.',
                'content'      => 'iPad Pro M4 hỗ trợ Apple Pencil, Magic Keyboard, phù hợp cho thiết kế và công việc sáng tạo.',
                'price'        => 31990000,
                'sale_price'   => 30990000,
                'thumbnail'    => 'ipadprom4.jpg',
                'status'       => 'published',
                'category_id'  => 2,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'Apple Watch Series 9',
                'slug'         => Str::slug('Apple Watch Series 9'),
                'description'  => 'Đồng hồ thông minh theo dõi sức khỏe và tập luyện.',
                'content'      => 'Apple Watch Series 9 với màn hình sáng hơn, chip nhanh hơn, tích hợp Siri thông minh.',
                'price'        => 11990000,
                'sale_price'   => 11490000,
                'thumbnail'    => 'applewatchs9.jpg',
                'status'       => 'published',
                'category_id'  => 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'Apple TV 4K',
                'slug'         => Str::slug('Apple TV 4K'),
                'description'  => 'Thiết bị giải trí tại gia hỗ trợ 4K HDR.',
                'content'      => 'Apple TV 4K cho trải nghiệm giải trí tuyệt vời với Dolby Vision và Siri Remote.',
                'price'        => 4990000,
                'sale_price'   => 4590000,
                'thumbnail'    => 'appletv4k.jpg',
                'status'       => 'published',
                'category_id'  => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}
