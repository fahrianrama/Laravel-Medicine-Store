<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //set data to database
        $data = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'status' => 'pending',
            ],
        ];
        //insert data to database
        foreach ($data as $key => $value) {
            Order::create($value);
        }
    }
}
