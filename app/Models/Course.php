<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'type_id',
        'price',
        'lesson_num',
        'video_length',
        'follow',
        'score',
        'video',
    ];
    //belongs to relationship course type
    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'type_id');
    }
}
