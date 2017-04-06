@extends('layouts.app')
@section('title' , 'Chọn Chuyên khoa')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chuyên Môn</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($specialist as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><a href="{{route('datlichkham',[$item->id])}}">Đặt lịch Khám</a></td>
                    </tr>
                        @endforeach
                </tbody>
            </table>


        </div>
    </div>

    @endsection