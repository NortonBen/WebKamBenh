<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = ['specialist_id','detail'];

    public function PatientRecord(){
        return $this->hasMany(PatientRecord::class);
    }

    public function PatientRegister(){
        return $this->hasMany(PatientRegister::class);
    }
}
