<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    //payment_id	payment_type	user_id
    protected $fillable = ['payment_id', 'user_id', 'payment_type', 'reference', 'amount', 'channel',
        'ip_address', 'gateway_response', 'item'];


    public function getUser(){
        $data=User::find($this->user_id);
        if($data) return $data->name." ".$data->middle_name." ".$data->last_name;
        else return '';
    }

    public function getState(){
        $data=Post::find($this->payment_uuid);
        if($data) return $data->name;
        else return '';
    }
}
