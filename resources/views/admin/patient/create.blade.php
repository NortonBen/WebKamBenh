@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Thêm Tài Khoản</h2>
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error')
            <ul>
                <li>Tên: {{ $user->first_name }} {{ $user->last_name }}</li>
            </ul>
            {!! Form::open(['route' => ['admin.patient.store',$user->id]]) !!}
            {{ Form::fHTML('history','Tiểu Bệnh Án') }}
            {{ Form::submit('Thêm Bênh Nhân',['class' => 'form-control']) }}
            {!! Form::close() !!}

        </div>
    </div>

@endsection