<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LearnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('learners')->insert([
            'first_name' => 'John',
            'last_name' => 'Smith',
            'uuid' => Str::uuid(),
            'created_at' => now(),
            'updated_at' => now(),
            'motivation' => Str::random(15),
            'release_date' => date('2024-09-01'),
            'accomplishments' => Str::random(20),
        ]);
    }
}