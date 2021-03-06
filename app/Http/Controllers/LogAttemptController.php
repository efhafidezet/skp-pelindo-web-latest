<?php

namespace App\Http\Controllers;

use App\Exports\ResultExport;
use App\Models\Group;
use App\Models\Log;
use App\Models\LogAttempt;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Questionnaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LogAttemptController extends Controller
{
    public function show() {
        // $listResult = LogAttempt::all();
        // $listUser = User::all();
        $listResult = DB::table('log_attempts')
        ->select('*', 'questionnaires.name AS qname', 'users.name AS uname')
        ->join('users','users.id','=','log_attempts.user_id')
        ->join('questionnaires','questionnaires.questionnaire_id','=','log_attempts.questionnaire_id')
        ->join('branches','branches.branch_id','=','log_attempts.branch')
        ->where('log_attempts.attempt', "1")
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

    public function exportExcel() {
        // $dataRes = DB::table('log_attempts')
        // ->select('log_attempts.log_attempt_id', 'log_attempts.attempt_date', 'questionnaires.questionnaire_id', 'questionnaires.name AS questionnaire_name', 'branches.branch_name')
        // ->join('users','users.id','=','log_attempts.user_id')
        // ->join('questionnaires','questionnaires.questionnaire_id','=','log_attempts.questionnaire_id')
        // ->join('branches','branches.branch_id','=','log_attempts.branch')
        // ->where('log_attempts.attempt', "1")
        // ->get();

        // foreach ($dataRes as $key => $value) {
        //     $listGroup = DB::table('groups')
        //         ->select('group_id', 'name')
        //         ->where('is_active', "1")->get();
        //     foreach ($listGroup as $key => $valueG) {
        //         $group = $listGroup;
        //         $groups = [];
        //         $groups = $group ;
        //         $value->group = $groups;
                
        //         $listQuestion = DB::table('questions')
        //             ->select('questions.question_id', 'questions.question')
        //             ->where('questions.questionnaire_id', $value->questionnaire_id)
        //             ->get();
        //         $question = $listQuestion;
        //         $questions = [];
        //         $questions = $question ;
        //         $valueG->question = $questions;

        //         foreach ($listQuestion as $key => $valueQ) {
        //             $listQAnswer = DB::table('answers')
        //                 ->select('answers.answer_1', 'answers.answer_2')
        //                 ->where('answers.log_attempt_id', $value->log_attempt_id)
        //                 ->where('answers.question_id', $valueQ->question_id)
        //                 ->get();
        //             $answer = $listQAnswer;
        //             $answers = [];
        //             $answers = $answer ;
        //             $valueQ->answer = $answers;
        //         }  
        //     }          
        // }
        // return $dataRes;
        return Excel::download(new ResultExport, 'hasilKuesioner_'.Carbon::now().'.xlsx');
	}
}
