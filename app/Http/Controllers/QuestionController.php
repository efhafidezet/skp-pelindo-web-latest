<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data = DB::table('questions')
        ->join('groups','groups.group_id','=','questions.group_id')
        ->where('questions.questionnaire_id', $id)
        ->get();
        return response()->json($data, 200);
    }
}
