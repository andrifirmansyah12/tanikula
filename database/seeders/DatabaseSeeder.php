<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // ActivityCategorySeeder::class,
            ActivitySeeder::class,
            EducationCategorySeeder::class,
            EducationSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProductCategorySeeder::class,
            GapoktanSeeder::class,
            PoktanSeeder::class,
            FarmerSeeder::class,
            ProductSeeder::class,
            CostumerSeeder::class,
            AddressSeeder::class
        ]);

        // $this->call(CategorySeeder::class);
    }
}
