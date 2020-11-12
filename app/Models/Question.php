<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'question',
        'questionnaire_id',
        'group_id',
        'is_active',
    ];

    protected $primaryKey = 'question_id';
}
