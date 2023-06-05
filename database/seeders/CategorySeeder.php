<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name' => 'cleaning',
            ],
            [
                'name' => 'transporant',
            ],
            [
                'name' => 'alictrinc',
            ],

            [
                'name' => 'heavy work',
            ],



        ];
        category::insert($data);
    }
}
