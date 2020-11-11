<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Log;
use App\Models\LogAttempt;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogAttemptController extends Controller
{
    public function show() {
        // $listResult = LogAttempt::all();
        // $listUser = User::all();
        $listResult = DB::table('log_attempts')
        ->select('*', 'questionnaires.name AS qname', 'users.name AS uname')
        ->join('users','users.id','=','log_attempts.user_id')
        ->join('questionnaires','questionnaires.questionnaire_id','=','log_attempts.questionnaire_id')
        ->get();
        return view('pages.results.list', compact('listResult'));
    }

    public function showDetail($id) {
        $getLogA = LogAttempt::where('log_attempt_id', $id)->firstOrFail();
        $getLogAID = $getLogA->questionnaire_id;
        $getLogUser = User::where('id', $getLogA->user_id)->firstOrFail();
        
        $listAnswer = DB::table('answers')
        ->join('questions','questions.question_id','=','answers.question_id')
        ->join('groups','groups.group_id','=','questions.group_id')
        ->where('answers.log_attempt_id', $id)
        ->get();

        $detailQ = Questionnaire::where('questionnaire_id', $getLogAID)->firstOrFail();
        $listGroup = Group::all()->sortBy("order");
        $listQuestionAnswer = QuestionAnswer::all();
        $list_0 = Question::all()->where('questionnaire_id', $getLogAID)->where('group_id', "0");
        $list_1 = Question::all()->where('questionnaire_id', $getLogAID);
        return view('pages.results.details.list', compact('detailQ','listGroup', 'listQuestionAnswer', 'list_0', 'list_1', 'listAnswer', 'getLogA', 'getLogUser'));
    }
}
