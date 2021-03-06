<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log_attempts';

    protected $fillable = [
        'log_attempt_id',
        'user_id',
        'questionnaire_id',
        'attempt',
        'attempt_date',
        'longtitude',
        'latitude',
        'photo',
        'created_at',
        'updated_at'
    ];
}
