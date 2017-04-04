<?php

namespace App\Http\Controllers\Admin;

use App\PatientRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($part = 30)
    {
        $records = PatientRecord::paginate($part);
        return view('admin.record.index',compact('records'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PatientRecord $record)
    {
        return view('admin.record.show',compact('record'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientRecord $record)
    {
        $record->delete();
        return redirect()->route('admin.records.index');
    }
}
