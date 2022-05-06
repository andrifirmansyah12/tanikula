<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $datas = [
            [
                "user_id" => 1,
                "city" => "Indramayu",
                "address" => 'Desa Lohbener, Kab Indramayu - Jawa Barat',
                "telp" => "081223943853",
            ],
        ];

        Admin::insert($datas);
    }
}
