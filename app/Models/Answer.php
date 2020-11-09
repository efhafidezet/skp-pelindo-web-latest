<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'answer_id',
        'log_attempt_id',
        'question_id',
        'answer_1',
        'answer_2',
        'created_at',
        'updated_at',
    ];
}
