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
        Schema::create("daily_answers", function (Blueprint $table) {
            $table->id();
            $table->integer("optimism_about_the_future");
            $table->integer("feeling_useful");
            $table->integer("feeling_relaxed");
            $table->integer("dealing_with_problems");
            $table->integer("thinking_clearly");
            $table->integer("feeling_close_to_people");
            $table->integer("being_able_to_make_up_my_mind");
            $table->enum("general_health_condition", [
                "very_good",
                "good",
                "fair",
                "bad",
                "very_bad",
            ]);
            $table->boolean("attended_yoga_today")->default(false);
            $table->enum("method_of_attending_yoga_classes", [
                "attended_online_live_session",
                "watched_the_recording",
                "not_applicable",
            ]);
            $table->enum("physical_activity", [
                "physical_activity",
                "arts_and_crafts",
                "social",
                "outdoor_activities",
                "chat_psychological_support_services",
                "advice",
                "educational_classes",
                "cultural_and_social_events",
                "other_activities",
            ]);
            $table->longText("other_activities");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("daily_questionnaires");
    }
};
