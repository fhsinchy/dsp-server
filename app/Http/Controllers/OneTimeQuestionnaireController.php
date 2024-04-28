<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OneTimeQuestionnaireController extends Controller
{
    public function __invoke(Request $request) {
        $user = $request->user();

        if ($user->intro_complete) {
            return response()->json([
                'success' => false,
                'message' => 'Answer Submission Already Complete!',
            ], 400);
        }

        DB::beginTransaction();
        try {
            $userHealthProfile = $user->healthProfile()->create([
                'optimism_about_the_future' => $request->optimism_about_the_future,
                'feeling_useful' => $request->feeling_useful,
                'feeling_relaxed' => $request->feeling_relaxed,
                'dealing_with_problems' => $request->dealing_with_problems,
                'thinking_clearly' => $request->thinking_clearly,
                'feeling_close_to_people' => $request->feeling_close_to_people,
                'being_able_to_make_up_my_mind' => $request->being_able_to_make_up_my_mind,
                'concern_1' => $request->concern_1,
                'concern_2' => $request->concern_2,
                'concern_1_level' => $request->concern_1_level,
                'concern_2_level' => $request->concern_2_level,             
            ]);

            foreach($request->mental_health_conditions as $mentalHealthConditionKey => $mentalHealthConditionValue) {
                $userHealthProfile->$mentalHealthConditionKey = $mentalHealthConditionValue;
            }

            foreach($request->health_problems_or_disabilities as $healthPromlemOrDisabilityKey => $healthPromlemOrDisabilityValue) {
                $userHealthProfile->$healthPromlemOrDisabilityKey = $healthPromlemOrDisabilityValue;
            }

            $userHealthProfile->save();

            $user->socioDemographicProfile()->create([
                'dob' => $request->dob,
                'self_described_gender' => $request->self_described_gender,
                'gender' => $request->gender,
                'difficulty_managing_household_income' => $request->difficulty_managing_household_income,
                'highest_level_of_education' => $request->highest_level_of_education,
                'employment_status' => $request->employment_status,
                'self_specified_ethnic_group' => $request->self_specified_ethnic_group,
                'ethnic_group' => $request->ethnic_group,
            ]);

            foreach ($request->family_members as $familyMember) {
                $user->socioDemographicProfile->familyMembers()->create([
                    'gender' => $familyMember['gender'],
                    'age' => $familyMember['age'],
                    'relationship' => $familyMember['relationship'],
                ]);
            }

            $user->intro_complete = true;
            $user->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Answer Submission Succesful!',
                'data' => $user,
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Answer Submission Failed!'
            ], 500);
        }
    }
}
