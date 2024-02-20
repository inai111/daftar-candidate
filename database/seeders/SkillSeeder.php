<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            [
                'name'=>'PHP',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'PostreSQL',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'API (JSON, REST)',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Version Control System (Github, GitLab, Dll.)',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
