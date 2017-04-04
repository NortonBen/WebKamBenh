@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Sửa Tài Khoản</h2>
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error')
            {!! Form::open(['route' => ['admin.specialist.update',$specialist->id]]) !!}
            {{ method_field('PUT') }}
            {{ Form::fText('name','Chuyên môn',old('name',$specialist->name)) }}
            {{ Form::submit('Lưu',['class' => 'form-control']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection