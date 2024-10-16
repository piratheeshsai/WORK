<?php

namespace Database\Seeders;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class useDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDetail::create([
            'full_name' => 'User',
            'userID' => 'User',
            'EmployeeId' => 'User1',
            'section' => 'Faculty',
            'subsection' => 'Mechanical Engineering',
            'department' => 'Mechanical Lab',
            'PhoneNumber' => '0757480809',
            'email' => 'User@gmail.com',
        ]);
        UserDetail::create([
            'full_name' => 'Admin',
            'userID' => 'Admin',
            'EmployeeId' => 'CO 0000',
            'section' => 'Administration',
            'subsection' => 'Maintenance',
            'department' => '',
            'PhoneNumber' => '075000000',
            'email' => 'admin@gmail.com',
        ]
    );
    }
}
