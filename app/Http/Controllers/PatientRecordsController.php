<?php

namespace App\Http\Controllers;
use App\Http\Requests\Admin\PatientRecordRequest;

use App\PatientRecord;
use App\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
    public function create( Specialist $specialist)
    {
       $doctors = DB::table('users')
            ->join('doctors',function ($join)use ($specialist){
                $join->on('users.id' ,'=','doctors.id')->where('doctors.specialist_id' , '=', $specialist->id);
            })->get();



        return view('site.patientrecord.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRecordRequest $request)
    {
        $data = $request->only(['doctor_id' ,'name' , 'detail']);
        $data['patient_id'] = Auth::id();
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
