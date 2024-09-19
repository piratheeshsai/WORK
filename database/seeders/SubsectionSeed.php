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
        ['name' => 'Mechanical Engineering','section_head' =>'abc', 'section_id' => 1],
        ['name' => 'Electrical Engineering','section_head' =>'swe', 'section_id' => 1],
        ['name' => 'Civil Engineering', 'section_head' =>'hju','section_id' => 1],
        // Administration
        ['name' => 'Finance Department','section_head' =>'abc', 'section_id' => 2],
        ['name' => 'Human Resources', 'section_head' =>'fgh','section_id' => 2],
        // Centers
        ['name' => 'Research Center','section_head' =>'gg', 'section_id' => 3],
        ['name' => 'Library Services', 'section_head' =>'ghh','section_id' => 3],
    ]);
}

}
