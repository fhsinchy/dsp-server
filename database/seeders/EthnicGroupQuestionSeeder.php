<?php

namespace Database\Seeders;

use App\Models\EthnicGroup;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EthnicGroupQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            'White British',
            'White Other',
            'Black or Black British',
            'Asian or Asian British',
            'Chinese',
            'Mixed',
            'Prefer Not To Say',
        ];

        $question = Question::create([
            'body' => 'To which of the groups listed below do you consider you belong?',
        ]);

        foreach ($options as $option) {
            $question->options()->create([
                'body' => $option,
            ]);
        }
    }
}
