@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Sửa Tài Khoản</h2>
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.error')
            {!! Form::open(['route' => ['admin.doctor.update',$doctor->id]]) !!}
            {{ method_field('PUT') }}
            {{ Form::fHTML('detail','Chi Tiết',old('detail',$doctor->detail)) }}
            {{ Form::fSelect('specialist_id','Chuyên Môn',$specialists,['val' => 'id', 'name' => 'name'],old('specialist_id',$doctor->specialist_id)) }}
            {{ Form::submit('Lưu',['class' => 'form-control']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection