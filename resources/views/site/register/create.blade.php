@extends('layouts.app')
@section('title','Đặt lịch hẹn')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 form-group">


            {!! Form::open(['route' => 'site.datlichkham.store']) !!}

            {!! Form::fSelect('doctor_id','Bác Sĩ' , $doctors , ['val' => 'id','name' =>'id']) !!}

            {!! Form::fSelect('patient_id' , 'Bệnh Nhân' , $patients , ['val' => 'id' ,'name' => 'id']) !!}

            {!! Form::fDate('start' , 'Thời gian bắt đầu' , 'datetime' ) !!}
            {!! Form::fDate('end' , 'Thời gian kết thúc' , 'datetime' ) !!}

            {!! Form::fHTML('description' , 'Mô tả') !!}

            {!! Form::submit('Đặt lịch' , ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>

    </div>

    @endsection