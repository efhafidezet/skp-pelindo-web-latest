<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AnswerController extends Controller
{
    public function save(Request $request) {
        $id = $request->input('id_questionnaire');
        DB::table('log_attempts')->insert([
          'user_id' => Auth::user()->id,
          'questionnaire_id' => $id,
          'attempt' => '1' ,
          'longitude' => '0',
          'latitude' => '0',
          'photo' => '0',
          'attempt_date' => date("Y-m-d h:i:s", time()),
          'created_at' => date("Y-m-d h:i:s", time()),
         ]);

        $data_log = DB::table('log_attempts')
        ->where('user_id', Auth::user()->id)
        ->where('questionnaire_id', $id)
        ->first();

        $id_log = $data_log->log_attempt_id;

        $group = $request->input('answer_data');
        foreach ($group as $data) {
            $answer = $data['answer'];
            foreach ($answer as $datas) {
                DB::table('answers')->insert([
                        'log_attempt_id' => $id_log ,
                        'question_id' => $datas['question_id'] ,
                        'answer_1' => $datas['answer_1'] ,
                        'answer_2' => $datas['answer_2'] ,
                        'created_at' => date("Y-m-d h:i:s", time()),
                ]);
            }
        }

        return response()->json('Success', 200);
    }
}
