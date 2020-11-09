<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function save(Request $request) {
        DB::table('answers')->insert([
                'log_attempt_id' => $request->get('log_attempt_id') , 
                'question_id' => $request->get('question_id') , 
                'answer_1' => $request->get('answer_1') , 
                'answer_2' => $request->get('answer_2') , 
                'created_at' => date("Y-m-d h:i:s", time()),
        ]);

        return response()->json('Success', 200);
    }
}
