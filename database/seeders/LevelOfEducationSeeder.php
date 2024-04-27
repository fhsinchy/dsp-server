<?php

namespace Database\Seeders;

use App\Models\LevelOfEducation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelOfEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            'Primary',
            'Secondary (GCSE or equivalent)',
            'Further (\'A\' Level or equivalent)',
            'Higher (university degree)',
            'Prefer not to say',
        ];

        foreach ($levels as $level) {
            LevelOfEducation::create([
                'title' => $level,
            ]);
        }
    }
}
