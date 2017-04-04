@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Danh Sách Bác Sĩ</h2>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Specialist</th>
                    <th>Birthday</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <?php $user = $doctor->User;
                    ?>
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $doctor->Specialist->name }}</td>
                        <td>
                            <a href="{{ route('admin.doctor.edit',$doctor->id) }}">Edit</a> |
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
            {{ $doctors->render() }}
        </div>
    </div>

@endsection