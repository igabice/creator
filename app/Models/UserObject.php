<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class UserObject extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'users';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [];

    public function getContractor(){
        $data = $this->hasOne(Contractor::class, 'id', 'contractor_id');
        if($data == null){
            return false;
        }else return $data;
    }
    public function getCompany(){
        $data = $this->hasOne(Company::class, 'id', 'company_id');
        if($data == null){
            return false;
        }else return $data;
    }
    public function getProfile(){
        $data = $this->hasOne(User::class, 'id', 'created_by');
        if($data == null){
            return false;
        }else return $data;
    }
}
