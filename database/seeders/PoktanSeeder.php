<?php

namespace Database\Seeders;
use App\Models\Poktan;

use Illuminate\Database\Seeder;

class PoktanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poktan::truncate();

        $datas = [
            [
                "user_id" => 3,
                "gapoktan_id" => 1,
                "chairman" => "Bapak Mara Lagi",
                "city" => "Kota Indramayu",
                "address" => 'Desa Krasak, Jatibarang - Indramayu',
                "telp" => "081223943853",
            ],
        ];

        Poktan::insert($datas);
    }
}
