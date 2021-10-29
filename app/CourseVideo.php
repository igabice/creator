<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    protected $table = 'course_video';
    protected $fillable = ['id', 'course_id', 'status', 'title', 'description', 'file'];

}
