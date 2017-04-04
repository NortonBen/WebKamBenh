<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SpecialistRequest;
use App\Specialist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($part = 30)
    {
        $specialists = Specialist::paginate($part);
        return view('admin.specialist.index',compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialistRequest $request)
    {
        $data = $request->only(['name']);
        if(Specialist::create($data)){
            return  redirect()->route('admin.specialist.index');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        return view('admin.specialist.show',compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        return view('admin.specialist.edit',compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialistRequest $request, Specialist $specialist)
    {
        $data = $request->only(['name']);
        if($specialist->update($data)){
            return  redirect()->route('admin.specialist.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->delete();
        return  redirect()->route('admin.specialist.index');
    }
}
