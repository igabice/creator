<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['user_id', 'product_id', 'status', 'extra'];


    public function getUser(){
        $data=User::find($this->created_by);
        if($data) return $data->name." ".$data->middle_name." ".$data->last_name;
        else return '';
    }

    public function getProduct(){
        $data=Product::find($this->product_id);
        return $data->name;
    }

}
