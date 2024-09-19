<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('section')->insert([
        ['name' => 'Faculty'],
        ['name' => 'Administration'],
        ['name' => 'Centers']
    ]);
}

}
