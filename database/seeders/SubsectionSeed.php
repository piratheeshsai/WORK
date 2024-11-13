<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubsectionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('subsections')->insert([
        // Faculties
        ['name' => 'Mechanical Engineering', 'section_id' => 1],
        ['name' => 'Electrical Engineering', 'section_id' => 1],
        ['name' => 'Civil Engineering','section_id' => 1],
        // Administration
        ['name' => 'Finance Department', 'section_id' => 2],
        ['name' => 'Human Resources','section_id' => 2],
        ['name' => 'Maintenance', 'section_id' => 2],

        // Centers
        ['name' => 'Research Center', 'section_id' => 3],
        ['name' => 'Library Services','section_id' => 3],
    ]);
}

}
