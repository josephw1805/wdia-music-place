<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Cyndi Wang',
                'email' => 'cyndi@gmail.com',
                'password' => bcrypt(12345678),
                'role' => 'artist',
                'approve_status' => 'approved'
            ],
            [
                'name' => 'Alice Wang',
                'email' => 'alice@gmail.com',
                'password' => bcrypt(12345678),
                'role' => 'student',
                'approve_status' => 'approved'
            ],
        ];

        User::insert($users);
    }
}
