<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('orders')->insert([
            [
                'user_id'          => 1,
                'status'           => 'pending',
                'total_price'      => 4500000.00,
                'shipping_address' => '123 Nguyễn Trãi, Hà Nội',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'user_id'          => 2,
                'status'           => 'completed',
                'total_price'      => 2990000.00,
                'shipping_address' => '456 Lê Lợi, TP.HCM',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'user_id'          => 3,
                'status'           => 'canceled',
                'total_price'      => 1290000.00,
                'shipping_address' => '789 Trần Hưng Đạo, Đà Nẵng',
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
        ]);
    }
}
