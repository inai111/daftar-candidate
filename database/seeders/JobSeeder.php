<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            [
                'name'=>'Front End Developer',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Fullstack Web Developer',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Quality Control',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
