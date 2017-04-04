@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Danh Sách Bác Sĩ</h2>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Specialist</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <?php
                         $patient = $record->Patient;
                         $doctor = $record->Doctor;
                    ?>
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $patient->User->full_name }}</td>
                        <td>{{ $doctor->User->full_name }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->created_at }}</td>
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
            {{ $records->render() }}
        </div>
    </div>

@endsection