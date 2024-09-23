<?php

namespace Database\Seeders;
use App\Models\userDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UseDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        userDetails::create([
            'full_name' => 'User',
            'userID' => 'User',
            'EmployeeId' => 'User1',
            'section' => 'Faculty',
            'subsection' => 'Mechanical Engineering',
            'department' => 'Mechanical Lab',
            'PhoneNumber' => '0757480809',
            'email' => 'User@gmail.com',
        ]);
    }
}
