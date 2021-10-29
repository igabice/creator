<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOwn extends Model
{
    protected $table = 'course_own';
    protected $fillable = ['id', 'product_id', 'user_id' ];

}
