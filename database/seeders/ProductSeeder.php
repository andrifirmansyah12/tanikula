<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $datas = [
            [
                "name" => "Beras Organik",
                "slug" => "beras-organik",
                "image" => "image.jpg",
                "category_product_id" => 1,
                "code" => "uqtewfde",
                "stoke" => 6,
                "price" => 100000,
                "desc" => "Ini adalah contoh kalimat untuk deskripsi",
                "user_id" => 1,
                "is_active" => true,
                'created_at' => Carbon::now()->format('Y-m-d'),
                'updated_at' => Carbon::now()->format('Y-m-d'),
            ],       
        ];

        Product::insert($datas);
    }
}
