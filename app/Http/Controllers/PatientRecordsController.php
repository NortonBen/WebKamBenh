<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\Admin\PatientRecordRequest;
use App\Patient;
use App\PatientRecord;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class PatientRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = PatientRecord::all();
        return view('site.patientrecord.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = Doctor::all();
        $patient = Patient::all();

        return view('site.patientrecord.create',compact('doctor' ,'patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRecordRequest $request)
    {
        $data = $request->only(['doctor_id' , 'patient_id','name' , 'detail']);
        if (PatientRecord::create($data))
        {
            return redirect()->route('site.patientrecord.index');
        }
        return redirect()->route('site.patientrecord.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
