@extends('layouts.app')
@section('title','Đăng ký')

@section('content')
    <div class="row">


        <div class="col-md-8 col-md-offset-2">
            <h2>Đăng ký</h2>
            @include('layouts.error')
            {!! Form::open(['route' => 'site.register.store' ]) !!}
            {{ Form::fText('first_name','Họ Tên Đệm') }}
            {{ Form::fText('last_name','Tên') }}
            {{ Form::fEmail('email','Email') }}
            {{ Form::fPassword('password','Mật khẩu') }}
            {{ Form::fPassword('repassword','Nhập Lại mật khẩu') }}
            {{ Form::fDate('birthday','Ngày Sinh') }}
            {{ Form::fText('phone','Số Diện Thoại') }}
            {{ Form::fText('address','Địa Chỉ') }}
            {{ Form::fSex('sex') }}
            {{ Form::fSelect('role_id','Phân Quyền',$roles,['val' => 'id', 'name' => 'name']) }}
            {{ Form::submit('Đăng ký',['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
    @endsection