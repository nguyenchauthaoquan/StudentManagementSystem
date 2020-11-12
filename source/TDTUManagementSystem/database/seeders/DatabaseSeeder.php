<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\TrainingProgram;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TrainingProgram::create([
            'name' => 'Chương trình tiêu chuẩn',
            'system' => 'Hệ đại học'
        ]);
        Faculty::create([
            'id' => '05',
            'name' => 'Information Technology'
        ]);
    }
}
