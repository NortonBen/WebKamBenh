@extends('layouts.app')
@section('title','Hồ Sơ')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Hồ sơ bệnh nhân.</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bác Sĩ</th>
                        <th>Bệnh Nhân</th>
                        <th>Tên Bệnh</th>
                        <th>Chi tiết</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <?php
                            $patient = $record->Patient;

                            $doctor = $record->Doctor;
                            ?>
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$doctor->User->first_name}} {{$doctor->User->last_name}}</td>
                        <td>{{$patient->User->first_name}} {{$patient->User->last_name}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->detail}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    @endsection