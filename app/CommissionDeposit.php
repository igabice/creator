<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionDeposit extends Model
{
    protected $table = 'commission_deposit';

    protected $fillable = ['wallet_id', 'product_id', 'amount', 'user_id'];

}
