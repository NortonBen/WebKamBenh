@extends("layouts.admin")

@section("content")
    <div class="row">
        <h2>Danh Sách Chuyên môn</h2>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Chuyên môn</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($specialists as $specialist)
                    <tr>
                        <td>{{ $specialist->id }}</td>
                        <td>{{ $specialist->name }}</td>
                        <td>
                            <a href="{{ route('admin.specialist.edit',$specialist->id) }}">Edit</a> |
                            <a href="#"  onclick="$('#delete-{{ $specialist->id }}').submit()"  >Delete</a>
                            <form  method="post" id="delete-{{ $specialist->id }}" action="{{ route('admin.specialist.destroy',$specialist->id) }}">
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
            {{ $specialists->render() }}
        </div>
    </div>

@endsection