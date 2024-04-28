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
        Schema::create('user_health_profiles', function (Blueprint $table) {
            $table->id();
            
            $table->integer('optimism_about_the_future');
            $table->integer('feeling_useful');
            $table->integer('feeling_relaxed');
            $table->integer('dealing_with_problems');
            $table->integer('thinking_clearly');
            $table->integer('feeling_close_to_people');
            $table->integer('being_able_to_make_up_my_mind');
            
            $table->longText('concern_1')->nullable();
            $table->longText('concern_2')->nullable();
            $table->integer('concern_1_level')->nullable();
            $table->integer('concern_2_level')->nullable();
            
            $table->boolean('no_condition')->default(false);
            $table->boolean('neurodivergency')->default(false);
            $table->boolean('learning_difficulty')->default(false);
            $table->boolean('blindness_or_partial_sight_loss')->default(false);
            $table->boolean('deafness_or_partial_hearing_loss')->default(false);
            $table->boolean('mental_health_condition')->default(false);
            $table->boolean('physical_disability')->default(false);
            $table->boolean('condition_prefer_not_to_say')->default(false);
            $table->text('specified_condition')->nullable();
            
            $table->boolean('diagnosed_with_mental_health_condition')->default(false);

            $table->boolean('depression')->default(false);
            $table->boolean('anxiety')->default(false);
            $table->boolean('mixed_anxiety_or_depression')->default(false);
            $table->boolean('obsessive_compulsive_disorder')->default(false);
            $table->boolean('a_phobia')->default(false);
            $table->boolean('an_eating_disorder')->default(false);
            $table->boolean('post_traumatic_stress_disorder')->default(false);
            $table->boolean('bipolar_disorder')->default(false);
            $table->boolean('schizophrenia')->default(false);
            $table->boolean('psychosis')->default(false);
            $table->boolean('mental_health_condition_prefer_not_to_say')->default(false);

            $table->text('specified_mental_health_condition')->nullable();

            $table->boolean('taking_mental_health_medicines')->default(false);
            
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_health_profiles');
    }
};
