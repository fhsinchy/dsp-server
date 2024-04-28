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
            foreach ($request->family_members as $familyMember) {
                $user->familyMembers()->create([
                    'gender' => $familyMember['gender'],
                    'age' => $familyMember['age'],
                    'relationship' => $familyMember['relationship'],
                ]);
            }

            $user->dob = $request->dob;
            if ($request->has('self_described_gender')) {
                $user->self_described_gender = $request->self_described_gender;
            } else {
                $user->gender = $request->gender;
            }
            $user->difficulty_managing_household_income = $request->difficulty_managing_household_income;
            $user->concern_1 = $request->concern_1;
            $user->concern_2 = $request->concern_2;
            $user->concern_1_level = $request->concern_1_level;
            $user->concern_2_level = $request->concern_2_level;
            $user->highest_level_of_education = $request->highest_level_of_education;
            $user->employment_status = $request->employment_status;
            if ($request->has('self_specified_ethnic_group')) {
                $user->self_specified_ethnic_group = $request->self_specified_ethnic_group;
            } else {
                $user->ethnic_group = $request->ethnic_group;
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
