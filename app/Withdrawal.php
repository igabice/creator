<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $table = 'withdrawal';
    protected $fillable = ['user_id', 'amount',];


}
