@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Thêm Tài Khoản</h2>
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error')
            {!! Form::open(['route' => 'admin.specialist.store']) !!}
            {{ Form::fText('name','Chuyên môn') }}
            {{ Form::submit('Thêm Chuyên Môn',['class' => 'form-control']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection