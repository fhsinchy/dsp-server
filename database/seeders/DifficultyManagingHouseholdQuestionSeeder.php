<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DifficultyManagingHouseholdQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            "Very easy",
            "Fairly easy",
            "Neither easy nor difficult",
            "Fairlt difficult",
            "Very difficult",
            "Prefer not to say",
        ];

        $question = Question::create([
            "body" =>
                "How easy or difficult do you find it to manage on your household’s income?",
            "questionnaire_id" => 0,
        ]);

        foreach ($options as $option) {
            $question->options()->create([
                "body" => $option,
            ]);
        }
    }
}
