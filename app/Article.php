<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'description', 'file_1', 'file_2', 'state_id', 'created_by', ];


    public function getUser(){
        $data=User::find($this->created_by);
        if($data) return $data->name." ".$data->middle_name." ".$data->last_name;
        else return '';
    }

    public function getState(){
        $data=State::find($this->state_id);
        if($data) return $data->name;
        else return '';
    }
}
