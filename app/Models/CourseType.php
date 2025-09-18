<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    //
    protected $fillable=[
        'title',
        'description',
        'order'
    ];
    //has many relationship
    public function courses(){
        return $this->hasMany(Course::class,'type_id');
    }
}
