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
<<<<<<< HEAD
        $this->call([
            EducationCategorySeeder::class,
            EducationSeeder::class
        ]);
=======
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
>>>>>>> 3f2c491c6b59c9f00bf53a2bee6fb116ae7ee9ae
    }
}
