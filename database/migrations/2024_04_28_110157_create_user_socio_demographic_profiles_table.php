<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_socio_demographic_profiles', function (Blueprint $table) {
            $table->id();
            $table->date("dob");
            $table->enum("gender", ["male", "female"])->nullable();
            $table->string("self_described_gender")->nullable();
            $table->string("self_specified_ethnic_group")->nullable();
            $table->enum('ethnic_group', [
                "white-british",
                "whiteother",
                "black_or_black_british",
                "asian_or_asian_british",
                "chinese",
                "mixed",
                "prefer_not_to_say",
            ])->nullable();
            $table->enum('difficulty_managing_household_income', [
                'very_easy',
                'fairly_easy',
                'neither_easy_nor_difficult',
                'fairly_difficult',
                'very_difficult',
                'prefer_not_to_say',
            ]);
            $table->enum('highest_level_of_education', [
                "primary",
                "secondary_gcse_or_equivalent)",
                "further_a_level_or_equivalent)",
                "higher_university_degree",
                "prefer_not_to_say",
            ]);
            $table->enum('employment_status', [
                "working_in_a_paid_job_30_plus_hours)",
                "working_in_a_paid_job__8_to_29_hours)",
                "working_in_a_paid_job_less_than_8_hours)",
                "self_employed",
                "not_in_a_paid_employment_or_looking_after_house_or_home",
                "full_time_student_at_school",
                "full_time_student_at_university_or_polytechnic_or_college",
                "unemployed",
                "retired_from_paid_employment",
                "unable_to_work_due_to_illness_or_disability",
                "prefer_not_to_say",
            ]);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_socio_demographic_profiles');
    }
};
