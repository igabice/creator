<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';

    protected $fillable = ['product_id', 'seller_id', 'user_id', 'quantity', 'payment_type', 'delivery_address', 'visible'];

    public function getUser(){
        $data=User::find($this->user_id);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }

}
