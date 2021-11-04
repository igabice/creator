<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $table = 'bundles';

    protected $fillable = ['title', 'price', 'active', 'product_1', 'product_2', 'product_3', 'product_4', 'product_5', 'commission', 'd_commission',
        'description', 'created_by', 'image'];

    public function getUser(){
        $data=User::find($this->created_by);
        if($data) return $data->name.' '.$data->last_name;
        else return '';
    }


}
