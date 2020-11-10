<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class QuestionController extends Controller
{
    public function store(Request $request) {
        echo $request->input('questionnaire_id');
        $input = $request->all();
        $chat = Question::create($input);

        return redirect('questionnaires/'.$request->input('questionnaire_id'));
    }

    public function questionAuth() {
        $data = Question::all();
        return response()->json($data, 200);
    }
    
    public function questionByIdAuth(Request $request) {
        $id = $request->input('question_id');
        $data = Question::where('question_id', $id)->get();
        return response()->json($data, 200);
    }
    
    public function questionByQuestionnaire(Request $request) {
        $id = $request->input('questionnaire_id');
        $data_question = DB::table('questions')
        ->join('groups','groups.group_id','=','questions.group_id')
        ->where('questions.questionnaire_id', $id)
        ->get();

        $id_user = Auth::user()->id;
        $data_log = DB::table('log_attempts')
        ->where('user_id', $id_user)
        ->where('questionnaire_id', $id)
        ->first();
        $id_log = "";
        if($data_log != null){
            $id_log = $data_log->log_attempt_id;
        }

        // $result = [
        //     'data_question' => $data_question,
        //     'id_log' => $id_log,
        // ];
        
        $listGroup = Group::all()->sortBy("order");
        
        foreach($listGroup as $item){
            $listQuestion = DB::table('questions')
                ->join('groups','groups.group_id','=','questions.group_id')
                ->where('groups.group_id', $item->group_id)
                ->get();
            $question = $listQuestion;
            $questions = [];
            $questions = $question ;
            $item->question = $questions;
        }
        
        $resQData = $listGroup;
        
        $result = [
            'question_data' => $resQData,
            'id_log' => $id_log,
        ];

        return response()->json($result, 200);
    }
}
