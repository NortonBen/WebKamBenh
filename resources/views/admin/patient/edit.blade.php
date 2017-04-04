@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Sửa Tài Khoản</h2>
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error')
            {!! Form::open(['route' => ['admin.patient.update',$patient->id]]) !!}
            {{ method_field('PUT') }}
            {{ Form::fHTML('history','Chi Tiết',old('history',$patient->history)) }}
            {{ Form::submit('Lưu',['class' => 'form-control']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection