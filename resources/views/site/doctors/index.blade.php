@extends('layouts.app')
@section('title' , 'Danh sách bác sĩ')
@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1>Danh sách Bác sĩ.</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ Tên Đệm</th>
                        <th>Tên</th>
                        <th>Chuyên Khoa</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <?php
                                $user = $doctor->User;

                        ?>
                        <tr>
                            <td>{{$doctor->id}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$doctor->Specialist->name}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a href="{{route('site.doctor.show',[$doctor->id])}}"> Chi tiết </a>
                            </td>
                        </tr>

                        @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @endsection