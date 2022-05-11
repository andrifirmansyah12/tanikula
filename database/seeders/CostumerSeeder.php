<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Costumer;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Costumer::truncate();

        $datas = [
            [
                "user_id" => 5,
                "address_id" => 1,
            ],

        ];

        Costumer::insert($datas);
    }
}
