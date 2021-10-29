<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'm_approved', 'c_approved', 'type'
    ];

    protected $table = 'campaign';

    public function getUser(){
        $data=User::find($this->user_id);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }
    public function getProduct(){
        $data=Product::find($this->product_id);
        if($data) return $data->name;
        else return '';
    }
}
