<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'userID' => 'Admin',
            'role' => 'Admin',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => 'User',
            'userID' => 'User',
            'role' => 'User',
            'password' => Hash::make('user'),
        ]);

        User::create([
            'name' => 'Engineer',
            'userID' => 'Engineer',
            'role' => 'Engineer',
            'password' => Hash::make('engineer'),
        ]);

        User::create([
            'name' => 'Civil',
            'userID' => 'Civil',
            'role' => 'Civil',
            'password' => Hash::make('civil'),
        ]);

        User::create([
            'name' => 'Electrical',
            'userID' => 'Electrical',
            'role' => 'Electrical',
            'password' => Hash::make('electrical'),
        ]);

        User::create([
            'name' => 'Recommender',
            'userID' => 'Recommender',
            'role' => 'Recommender',
            'password' => Hash::make('recommender'), // Consider using lowercase
        ]);
    }
}
