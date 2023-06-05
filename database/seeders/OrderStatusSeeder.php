<?php

namespace Database\Seeders;

use App\Models\OrdersStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'waiting',
            ],
            [
                'name' => 'finished',
            ],
            [
                'name' => 'reject',
            ],
            [
                'name' => 'approved',
            ],




        ];
        OrdersStatus::insert($data);
    }
}
