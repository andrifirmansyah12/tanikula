<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gapoktan;

class GapoktanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gapoktan::truncate();

        $datas = [
            [
                "user_id" => 2,
                "chairman" => "Bapak Mara",
                "city" => "Kota Indramayu",
                "address" => 'Desa Krasak, Jatibarang - Indramayu',
                "telp" => "081223943853",
            ],
        ];

        Gapoktan::insert($datas);
    }
}
