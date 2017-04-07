@extends('layouts.app')
@section('title','Danh sách đăng ký')

@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bác sĩ</th>
                        <th>Bệnh nhân</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Mô tả</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($registers as  $register)
                    <?php
                            $doctor = $register->Doctor;
                            $patient = $register->Patient;
                            ?>
                    <tr>

                        <td>{{$register->id}}</td>
                        <td>{{$doctor->User->first_name }} {{$doctor->User->last_name}}</td>
                        <td>{{$patient->User->first_name}} {{$patient->User->last_name}}</td>
                        <td>{{$register->start}}</td>
                        <td>{{$register->end}}</td>
                        <td>{{$register->description}}</td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    @endsection