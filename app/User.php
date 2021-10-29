<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'middle_name', 'active', 'phone', 'email', 'phone_2', 'role', 'password', 'account_name', 'account_number', 'bank', 'id_type', 'nok_email', 'nok_relationship',
        'referred_by_1', 'referred_by_2', 'referred_by_3', 'rating', 'image', 'username', 'id_verified', 'id_card', 'nok_name', 'nok_phone', 'nok_image', 'is_kyc'];

    public function isAdmin(){
        if($this->admin==1)return true;
        else return false;
    }
    
    public function myWallet(){
        $data=Wallet::where('user_id', $this->id)->first();
        if($data) return $data;
        else return '';
    }

    public function getWallet(){
        $data=Wallet::where('user_id', $this->id)->first();
        if($data) return $data->balance;
        else return '';
    }
    public function getRole(){
        if($this->role == 'M') return 'Marketer';
        if($this->role == 'C') return 'Creator';
        else return '';
    }

    public function getProfilePicture(){
        return null;//$this->profile_picture ? public_path('profile_pictures') . "/".$this->email.'/'.$this->profile_picture : null;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
}
