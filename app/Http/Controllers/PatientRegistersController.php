<?php

namespace App\Http\Controllers;




use App\PatientRegister;
use App\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientRegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $registers =  PatientRegister::all();
        return view('site.register.index',compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Specialist $specialist)
    {

        $doctors = DB::table('users')
            ->join('doctors',function ($join)use ($specialist){
                $join->on('users.id' ,'=','doctors.id')->where('doctors.specialist_id' , '=', $specialist->id);
            })->get();
        $doctors = $doctors->toArray();

        $doctor = array_map([$this,'getDoctor'],$doctors);

        return view('site.register.create',compact('doctors'));
    }

    private function getDoctor($item){
        $item->full_name = $item->first_name.' '.$item->last_name;
        return (object)$item;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $data = $request->only(['doctor_id','patient_id', 'start' , 'end', 'description']);

        $data['patient_id'] = Auth::id();

        $register = new PatientRegister($data);
        if ($register->save())
        {
            return redirect()->route('datlichkham.index');
        }
        return redirect()->back();
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
