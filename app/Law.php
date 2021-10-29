<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $table = 'law';
    protected $fillable = ['long_title', 'title', 'date_published', 'description', 'citation', 'enactment', 'state_id', 'price', 'status', 'created_by',
        'word', 'pdf', 'json', 'short_word'];


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
    public function getSubSections(){
        return Withdrawal::where('law_id', $this->id)->where('section_type', 'section')->count();

    }
}
