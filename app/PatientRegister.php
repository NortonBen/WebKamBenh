<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRegister extends Model
{

    protected $fillable  =  ['patient_id','doctor_id','start','end'];

    public  function Doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function Patient(){
        return $this->belongsTo(Patient::class);
    }
}
