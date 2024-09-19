<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('departments')->insert([
        // Mechanical Engineering Faculty
        ['name' => 'Mechanical Lab', 'subsections_id' => 1],
        ['name' => 'Automotive Section', 'subsections_id' => 1],
        // Finance Department under Administration
        ['name' => 'Accounts Payable', 'subsections_id' => 2],
        ['name' => 'Accounts Receivable', 'subsections_id' => 2],
        // Research Center under Centers
        ['name' => 'AI Research', 'subsections_id' => 3],
        ['name' => 'Climate Studies', 'subsections_id' => 3],
    ]);
}

}
