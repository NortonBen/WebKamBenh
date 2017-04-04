<?php

namespace App\Http\Controllers\Admin;

use App\PatientRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($part = 30)
    {
        $registers =  PatientRegister::paginate($part);
        return view('admin.register.index',compact('registers'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PatientRegister $register)
    {
        return view('admin.register.show',compact('register'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientRegister $register)
    {
        $register->delete();
        return redirect()->route('admin.register.index');
    }
}
