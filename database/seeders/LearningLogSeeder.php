<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearningLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'contents_name' => 'PHP',
                'learning_time' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'contents_name' => 'React',
                'learning_time' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'contents_name' => 'aws',
                'learning_time' => 10,
                'created_at' => '2024-04-03 19:40:33.000',
                'updated_at' => '2024-04-03 19:40:33.000',
            ],
        ];

        DB::table('learning_logs')->insert($data);
    }
}
