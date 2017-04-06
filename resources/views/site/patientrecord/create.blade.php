@extends('layouts.app')
@section('title','Thêm hồ sơ Bệnh nhân')
@section('content')
    <div class="col-md-8 col-md-offset-2">


        @include('layouts.error')
        {!! Form::open(['route' => 'site.patientrecord.store']) !!}
        {!! Form::fSelect('doctor_id','Bác Sĩ',$doctor,['val' => 'id' , 'name' => 'id']) !!}
        {!! Form::fSelect('patient_id','Bệnh Nhân',$patient,['val' => 'id' , 'name' => 'id']) !!}
        {!! Form::fText('name' , 'Tên Bệnh' ) !!}
        {!! Form::fHTML('detail','Chi tiết') !!}
        {!! Form::submit('Thêm Hồ sơ',['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    </div>
    @endsection