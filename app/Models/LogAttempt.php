<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAttempt extends Model
{
    use HasFactory;

    protected $table = 'log_attempts';

    protected $fillable = [
        'log_attempt_id',
        'user_id',
        'questionnaire_id',
        'branch',
        'attempt',
        'attempt_date',
        'longitude',
        'latitude',
        'photo',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user');
    }
}
