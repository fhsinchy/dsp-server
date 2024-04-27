<?php

namespace Database\Seeders;

use App\Models\EmploymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Working in a paid job (30+ hours)',
            'Working in a paid job (8-29 hours)',
            'Working in a paid job (Less than hours)',
            'Self employed',
            'Not in a paid employment/looking after house or home',
            'Full time student at school',
            'Full time student at university/polytechnic/college',
            'Unemployed',
            'Retired from paid employment',
            'Unable to work due to illness/disability',
            'Prefer not to say',
        ];

        foreach($statuses as $status) {
            EmploymentStatus::create([
                'title' => $status,
            ]);
        }
    }
}
