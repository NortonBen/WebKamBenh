<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'first_name','last_name', 'email', 'password','birthday','sex','address','role_id','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function full_name(){
        return $this->first_name .' '.$this->last_name;
    }


    public function  Doctor(){
        if($this->role == 2){
            return $this->hasOne(Doctor::class,'id','id');
        }
        return null;
    }

    public function  Patient(){
        if($this->role == 3){
            return $this->hasOne(Patient::class,'id', 'id');
        }
        return null;
    }
}
