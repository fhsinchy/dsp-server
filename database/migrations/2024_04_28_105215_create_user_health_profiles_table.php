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
