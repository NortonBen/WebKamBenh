<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = ['specialist_id','detail','id'];

    public function PatientRecord(){
        return $this->hasMany(PatientRecord::class);
    }

    public function Specialist(){
        return $this->belongsTo(Specialist::class);
    }

    public function User(){
        return $this->belongsTo(User::class,'id','id');
    }

    public function PatientRegister(){
        return $this->hasMany(PatientRegister::class);
    }
}
