<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['title', 'content', 'created_by', 'school_id'];



    public function getUser(){
        $data=User::find($this->created_by);
        if($data) return $data->name." ".$data->middle_name." ".$data->last_name;
        else return '';
    }


}
