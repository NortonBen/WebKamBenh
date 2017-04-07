<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRegister extends Model
{
    protected $table = 'patient_registers';

    protected $fillable  =  ['patient_id','doctor_id','start','end' , 'description'];

    public  function Doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function Patient(){
        return $this->belongsTo(Patient::class);
    }
}
