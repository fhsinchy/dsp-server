<?php

namespace Database\Seeders;

use App\Models\EthnicGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EthnicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            'White British',
            'White Other',
            'Black or Black British',
            'Asian or Asian British',
            'Chinese',
            'Mixed',
            'Prefer Not To Say',
        ];

        foreach ($groups as $group) {
            EthnicGroup::create([
                'name'  => $group,
            ]);
        }
    }
}
