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
                "poktan_id" => 1,
                "city" => "Kota Indramayu",
                "address" => 'Desa Krasak, Jatibarang - Indramayu',
                "telp" => "081223943853",
            ],
        ];

        Farmer::insert($datas);
    }
}
