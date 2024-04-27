<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            'Primary',
            'Secondary (GCSE or equivalent)',
            'Further (\'A\' Level or equivalent)',
            'Higher (university degree)',
            'Prefer not to say',
        ];

        $question = Question::create([
            'body' => 'What is the highest level of education completed?',
        ]);

        foreach ($options as $option) {
            $question->options()->create([
                'body' => $option,
            ]);
        }
    }
}
