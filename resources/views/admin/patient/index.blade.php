@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Danh Sách Bệnh Nhân</h2>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <?php $user = $patient->User;
                    ?>
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>
                            <a href="{{ route('admin.patient.edit',$patient->id) }}">Edit</a> |
                            <a href="{{ route('admin.patient.show',$patient->id) }}">Show</a> |
                            <a href="#"  onclick="$('#delete-{{ $patient->id }}').submit()"  >Delete</a>
                            <form  method="post" id="delete-{{ $patient->id }}" action="{{ route('admin.patient.destroy',$patient->id) }}">
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
            {{ $patients->render() }}
        </div>
    </div>

@endsection