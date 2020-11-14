<?php

namespace App\Exports;

use App\Models\LogAttempt;
use Maatwebsite\Excel\Concerns\FromCollection;

class Questionnaire1Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LogAttempt::all();
    }
}
