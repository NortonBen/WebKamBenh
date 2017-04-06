@extends('layouts.app')
@section('title' ,'Chi Tiết')
@section('content')

    <div class="row">
        @foreach($doctors as $doctor)


        <div class="col-md-3">
            <h2>Bác sĩ : {{$doctor_id->User->first_name}} {{$doctor_id->User->last_name}}</h2>
            <h3>Chuyên Khoa : {{$doctor->Specialist->name}}</h3>
        </div>
        <div class="col-md-9">
            <h2>Thông tin chi tiết: </h2>
            <p>{{$doctor->detail}}</p>
        </div>
        @endforeach
    </div>

    @endsection