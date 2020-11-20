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
        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => bcrypt('1234'),
            'role' => 'user' 
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@test.com',
            'password' => bcrypt('1234'),
            'role' => 'manager' 
        ]);
    }
}
