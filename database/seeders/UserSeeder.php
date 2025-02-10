<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo danh sách users
        $users = [
            ['id' => 1, 'name' => 'User zero', 'email' => 'user0@example.com', 'password' => Hash::make('password')],
            ['id' => 2, 'name' => 'User One', 'email' => 'user1@example.com', 'password' => Hash::make('password')],
            ['id' => 3, 'name' => 'User Two', 'email' => 'user2@example.com', 'password' => Hash::make('password')],
            ['id' => 4, 'name' => 'User Three', 'email' => 'user3@example.com', 'password' => Hash::make('password')],
            ['id' => 5, 'name' => 'User Four', 'email' => 'user4@example.com', 'password' => Hash::make('password')],
            ['id' => 6, 'name' => 'User Five', 'email' => 'user5@example.com', 'password' => Hash::make('password')],
            ['id' => 7, 'name' => 'User Six', 'email' => 'user6@example.com', 'password' => Hash::make('password')],
        ];

        // Tạo users bằng User::create()
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
