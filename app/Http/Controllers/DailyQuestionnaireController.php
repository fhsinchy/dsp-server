<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DailyQuestionnaireController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        DB::beginTransaction();
        try {
            $user->dailyAnswers()->create([
                "optimism_about_the_future" =>
                    $request->optimism_about_the_future,
                "feeling_useful" => $request->feeling_useful,
                "feeling_relaxed" => $request->feeling_relaxed,
                "dealing_with_problems" => $request->dealing_with_problems,
                "thinking_clearly" => $request->thinking_clearly,
                "feeling_close_to_people" => $request->feeling_close_to_people,
                "being_able_to_make_up_my_mind" =>
                    $request->being_able_to_make_up_my_mind,
                "general_health_condition" =>
                    $request->general_health_condition,
                "attended_yoga_today" => $request->attended_yoga_today,
                "method_of_attending_yoga_classes" =>
                    $request->method_of_attending_yoga_classes,
                "physical_activity" => $request->physical_activity,
                "other_activities" => $request->other_activities,
            ]);
            DB::commit();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Answer Submission Succesful!",
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollback();

            return response()->json(
                [
                    "success" => false,
                    "message" => "Answer Submission Failed!",
                ],
                500
            );
        }
    }
}
