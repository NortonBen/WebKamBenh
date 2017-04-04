<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRecord extends Model
{
    protected $fillable = ['name','doctor_id','patient_id','detail'];

    public  function Doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function Patient(){
        return $this->belongsTo(Patient::class);
    }
}
