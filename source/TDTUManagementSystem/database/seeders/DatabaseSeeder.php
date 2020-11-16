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
            'name' => 'Regular Program',
            'system' => 'University'
        ]);
        Faculty::create([
            'id' => '06',
            'name' => 'Science Application'
        ]);
    }
}
