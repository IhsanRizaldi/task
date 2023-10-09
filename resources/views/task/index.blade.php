@extends('master.index')
@section('main')
    <div class="container">

        @if ($message = Session::get('sukses'))
            <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mt-5 justify-content-center">
            <div class="col-md-10">
                <div class="d-flex">
                    <h1>List Tasks</h1>
                    <a href="{{ route('task.create') }}" class="btn btn-sm btn-primary ms-auto mb-3">Add</a>
                </div>
                <table class="table table-responsive">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($task as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>
                                <a href="{{ route('task.edit',$data->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('task.destroy',$data->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
