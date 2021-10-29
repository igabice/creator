<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $table = 'topup';
    //payment_id	payment_type	user_id
    protected $fillable = ['wallet_id', 'user_id', 'owner_id', 'amount', 'description', 'type'];


    public function getAdmin(){
        $data=User::find($this->user_id);
        if($data) return $data->name." ".$data->middle_name." ".$data->last_name;
        else return '';
    }

    public function getUser(){
        $data=User::find($this->owner_id);
        if($data) return $data->name." ".$data->middle_name." ".$data->last_name;
        else return '';
    }

    public function getState(){
        $data=Post::find($this->payment_uuid);
        if($data) return $data->name;
        else return '';
    }
}
