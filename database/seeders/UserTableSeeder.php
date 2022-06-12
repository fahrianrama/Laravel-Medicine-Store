<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Admin',
            'gender' => 'laki',
            'location' => 'unknown',
            'role' => 'admin',
        ]);
    }
}
