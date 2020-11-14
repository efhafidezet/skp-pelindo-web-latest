<?php

namespace App\Exports;

use App\Models\LogAttempt;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ResultExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection() {
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
    // }

    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [
            "asd",
            "qwe",
        ];

        // for ($month = 1; $month <= 12; $month++) {
            $sheets["asd"] = new Questionnaire1Export();
        // }

        return $sheets;
    }
}
