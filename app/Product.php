<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['link', 'image', 'user_id', 'commission', 'd_commission', 'best', 'price', 'name', 'visible', 'type'];

    public function getUser(){
        $data=User::find($this->user_id);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }

}
