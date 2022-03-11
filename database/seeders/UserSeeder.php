<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('1234567'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Gapoktan',
            'email' => 'gapoktan@test.com',
            'password' => bcrypt('1234567'),
        ]);

        $user->assignRole('gapoktan');

        $admin = User::create([
            'name' => 'Poktan',
            'email' => 'poktan@test.com',
            'password' => bcrypt('1234567'),
        ]);

        $admin->assignRole('poktan');

        $user = User::create([
            'name' => 'Petani',
            'email' => 'petani@test.com',
            'password' => bcrypt('1234567'),
        ]);

        $user->assignRole('petani');

        $admin = User::create([
            'name' => 'Pembeli',
            'email' => 'pembeli@test.com',
            'password' => bcrypt('1234567'),
        ]);

        $admin->assignRole('pembeli');

    }
}
