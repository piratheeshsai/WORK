<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'userID' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'Admin',
                'password' => Hash::make('admin')
            ],
            [
                'name' => 'User',
                'userID' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'User',
                'password' => Hash::make('user')
            ],
            [
                'name' => 'Engineer',
                'userID' => 'Engineer',
                'email' => 'Enginner@gmail.com',
                'role' => 'Engineer',
                'password' => Hash::make('engineer')
            ],
            [
                'name' => 'Civil',
                'userID' => 'Civil',
                'email' => 'Civil@gmail.com',
                'role' => 'Civil',
                'password' => Hash::make('civil')
            ],
            [
                'name' => 'Electrical',
                'userID' => 'Electrical',
                'email' => 'Electrical@gmail.com',
                'role' => 'Electrical',
                'password' => Hash::make('electrical')
            ],
            [
                'name' => 'Recommender',
                'userID' => 'Recommender',
                'email' => 'Recommender@gmail.com',
                'role' => 'Recommender',
                'password' => Hash::make('Recommender')
            ],
        ]);
    }
}
