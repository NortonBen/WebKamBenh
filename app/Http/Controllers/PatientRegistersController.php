<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\Admin\PatientRecordRequest;
use App\Patient;
use App\PatientRegister;
use App\Specialist;
use App\User;
use Illuminate\Http\Request;

class PatientRegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();

        $patients = Patient::all();
        return view('site.register.create',compact('doctors','patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRecordRequest $request )
    {
        $data = $request->only(['doctor_id', 'patient_id', 'start' , 'end', 'description']);
        $user = new User();
        $data['id'] = $user->id;
        $register = new PatientRegister($data);
        if ($register->save())
        {
            return redirect()->route('site.datlichkham.index');
        }
        return redirect()->action('PatientRegistersController@create');
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
