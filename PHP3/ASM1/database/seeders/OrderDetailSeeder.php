<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('order_details')->insert([
            [
                'order_id'    => 1,
                'product_id'  => 4,
                'quantity'    => 2,
                'price'       => 2990000.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'order_id'    => 1,
                'product_id'  => 5,
                'quantity'    => 1,
                'price'       => 1290000.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'order_id'    => 2,
                'product_id'  => 6,
                'quantity'    => 3,
                'price'       => 590000.00,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
