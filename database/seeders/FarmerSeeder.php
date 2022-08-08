<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farmer;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farmer::truncate();

        $datas = [
            [
                "user_id" => 4,
                "gapoktan_id" => 1,
                "poktan_id" => 1,
                "is_active" => 1,
            ],
        ];

        Farmer::insert($datas);
    }
}
