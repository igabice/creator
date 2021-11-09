<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['balance', 'user_id', 'referral_bonus', 'sales', 'worth'];

    protected $table = 'wallet';

    public function getUser(){
        $data=User::find($this->user_id);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }
}
