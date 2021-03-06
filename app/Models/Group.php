<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'order',
        'is_active',
    ];

    protected $primaryKey = 'group_id';

    // public function getNameAttribute($name) {
    //     return ucwords($name);
    // }
}
