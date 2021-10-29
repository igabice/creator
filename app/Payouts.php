<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payouts extends Model
{
    protected $fillable = ['amount', 'user_id', 'verified', 'approved_by'];

    protected $table = 'payouts';

    public function getUser(){
        $data=User::find($this->user_id);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }
    
    public function getAccount(){
        $data=User::find($this->user_id);
        if($data) return $data->bank.': '.$data->account_number;
        else return '';
    }
    public function getApprovedBy(){
        $data=User::find($this->approved_by);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }
}
