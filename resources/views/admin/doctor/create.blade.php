@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Thêm Tài Khoản</h2>
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error')
            <ul>
                <li>Tên: {{ $user->first_name }} {{ $user->last_name }}</li>
            </ul>
            {!! Form::open(['route' => ['admin.doctor.store',$user->id]]) !!}
            {{ Form::fHTML('detail','Chi Tiết') }}
            {{ Form::fSelect('specialist_id','Chuyên Môn',$specialists,['val' => 'id', 'name' => 'name']) }}
            {{ Form::submit('Thêm Thêm Tin Bác Si',['class' => 'form-control']) }}
            {!! Form::close() !!}

        </div>
    </div>

@endsection