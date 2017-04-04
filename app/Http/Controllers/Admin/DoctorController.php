<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Requests\Admin\DoctorRequest;
use App\Patient;
use App\PatientRecord;
use App\Specialist;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($part = 30)
    {
        $doctors = Doctor::paginate($part);
        return view('admin.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $specialists = Specialist::all();
        return view('admin.doctor.create',compact('user','specialists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request,User $user)
    {
        $data = $request->only(['specialist_id','detail']);
        $data['id'] = $user->id;
        if(Doctor::create($data)){
            return redirect()->route('admin.doctor.index');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $doctor = Doctor::find(['id'=>$id])->first();
        if($doctor == null){
            return redirect()->route('admin.doctor.create',$id);
        }
        $records = $doctor->PatientRecord();
        return view('admin.doctor.show',compact('doctor','records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specialists = Specialist::all();
        return view('admin.doctor.edit',compact('doctor','specialists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $data = $request->only(['specialist_id','detail']);
        if($doctor->update($data)){
            return redirect()->route('admin.doctor.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

    }
}
