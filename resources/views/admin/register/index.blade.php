@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Danh Sách Dăng Kí</h2>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Start</th>
                    <th>End</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($registers as $register)
                    <?php
                    $patient = $register->Patient;
                    $doctor = $register->Doctor;
                    ?>
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $patient->User->full_name }}</td>
                        <td>{{ $doctor->User->full_name }}</td>
                        <td>{{ $record->start }}</td>
                        <td>{{ $record->end }}</td>
                        <td>
                            <a href="{{ route('admin.doctor.show',$doctor->id) }}">Show</a> |
                            <a href="#"  onclick="$('#delete-{{ $doctor->id }}').submit()"  >Delete</a>
                            <form  method="post" id="delete-{{ $doctor->id }}" action="{{ route('admin.doctor.destroy',$doctor->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{ $registers->render() }}
        </div>
    </div>

@endsection