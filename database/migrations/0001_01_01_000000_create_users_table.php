<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->boolean("intro_complete")->default(false);
            $table->enum("user_type", ["user", "admin"])->default("user");
            $table->date("dob")->nullable();
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
            ])->nullable();
            $table->enum('highest_level_of_education', [
                "primary",
                "secondary_gcse_or_equivalent)",
                "further_a_level_or_equivalent)",
                "higher_university_degree",
                "prefer_not_to_say",
            ])->nullable();
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
            ])->nullable();
            $table->longText('concern_1')->nullable();
            $table->longText('concern_2')->nullable();
            $table->integer('concern_1_level')->nullable();
            $table->integer('concern_2_level')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create("password_reset_tokens", function (Blueprint $table) {
            $table->string("email")->primary();
            $table->string("token");
            $table->timestamp("created_at")->nullable();
        });

        Schema::create("sessions", function (Blueprint $table) {
            $table->string("id")->primary();
            $table->foreignId("user_id")->nullable()->index();
            $table->string("ip_address", 45)->nullable();
            $table->text("user_agent")->nullable();
            $table->longText("payload");
            $table->integer("last_activity")->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("users");
        Schema::dropIfExists("password_reset_tokens");
        Schema::dropIfExists("sessions");
    }
};
