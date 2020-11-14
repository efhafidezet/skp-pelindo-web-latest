<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\LogAttempt;
use App\Models\Questionnaire;
use App\Models\Respondent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RespondentController extends Controller
{
    public function show() {
        $listRespondent = DB::table('log_attempts')
        ->select('*', 'questionnaires.name AS qname', 'users.name AS uname')
        ->join('users','users.id','=','log_attempts.user_id')
        ->join('questionnaires','questionnaires.questionnaire_id','=','log_attempts.questionnaire_id')
        ->join('branches','branches.branch_id','=','log_attempts.branch')
        ->where('users.role', "3")->where('users.is_active', "1")
        ->get();
        $listQuestionnaire = Questionnaire::all()->where('is_active', "1");
        $listBranch = Branch::all()->where('is_active', "1");
        return view('pages.users.respondents.list', compact('listRespondent', 'listQuestionnaire', 'listBranch'));
    }

    public function store(Request $request) {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            'details' => $request->get('details'),
            'is_active' => $request->get('is_active'),
        ]);

        $getUserData = User::where('name', $request->get('name'))->where('email', $request->get('email'))->firstOrFail();

        $log = LogAttempt::create([
            'user_id' => $getUserData->id,
            'questionnaire_id' => $request->get('questionnaire_id'),
            'branch' => $request->get('branch_id'),
            'attempt' => "0",
            'attempt_date' => "1970-01-01 00:00:00",
            'longitude' => "0",
            'latitude' => "0",
            'photo' => "0",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        return redirect('respondents/');
    }

    public function update(Request $request) {
        $data = Respondent::where('id', $request->input('id'))->firstOrFail();
        $data->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            'details' => $request->get('details'),
            'is_active' => $request->get('is_active'),
        ]);

        return redirect('respondents/');
    }
    public function delete(Request $request) {
        $data = Respondent::where('id', $request->input('id'))->firstOrFail();
        $data->update([
            'is_active' => $request->get('is_active'),
        ]);

        return redirect('respondents/');
    }
}
