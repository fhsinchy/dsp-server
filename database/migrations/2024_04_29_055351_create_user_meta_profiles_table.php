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
        Schema::create('user_meta_profiles', function (Blueprint $table) {
            $table->id();
            $table->boolean("for_physical_health")->default(false);
            $table->boolean("for_mental_health_wellbeing")->default(false);
            $table->boolean("for_social_isolation")->default(false);
            $table->boolean("for_lifestyle_change")->default(false);
            $table->boolean("for_self_care_self_management")->default(false);
            $table->boolean("for_social_welfare_advice")->default(false);
            $table->boolean("for_financial_advice")->default(false);
            $table->boolean("for_work")->default(false);
            $table->boolean("for_training_and_learning")->default(false);
            $table->boolean("for_prefer_not_to_say")->default(false);
            $table->text("for_self_specified_reason")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_meta_profiles');
    }
};
