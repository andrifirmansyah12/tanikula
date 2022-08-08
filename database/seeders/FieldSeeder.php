<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Field;
use App\Models\FieldCategory;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldCategory::truncate();

        $datas = [
            [
                "name" => 'Sawah',
                "details" => 'Padi',
            ],
            [
                "name" => 'Kebun',
                "details" => 'Jagung',
            ],
        ];

        FieldCategory::insert($datas);

        Field::truncate();

        $datas = [
            [
                "field_category_id" => 1,
                "gapoktan_id" => 1,
                "farmer_id" => 1,
                "status" => 'Selesai',
            ],
            [
                "field_category_id" => 2,
                "gapoktan_id" => 1,
                "farmer_id" => 1,
                "status" => 'Belum Selesai',
            ],
        ];

        Field::insert($datas);
    }
}
