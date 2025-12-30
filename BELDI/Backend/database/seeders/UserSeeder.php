<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Sara Admin',
            'email' => 'saradmin@beldi.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::factory(5)->create();
    }
}
