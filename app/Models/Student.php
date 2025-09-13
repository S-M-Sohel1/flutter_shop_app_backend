<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'score',
        'age',
        'open_id',
        'type',
        'token',
        'score'
    ];
}
