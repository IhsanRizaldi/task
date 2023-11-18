@extends('master.index')
@section('main')
@include('sweetalert::alert')
    <div class="container">
        <div class="row mt-5 justify-content-center text-center">
            <div class="col-md-12 ">
                <h3>Selamat Datang {{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="row mt-2 text-center justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Sudah Di Kerjakan</h5>
                        <h5 class="text-success">0</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Belum Di Kerjakan</h5>
                        <h5 class="text-danger">0</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-10">
                <div class="d-flex">
                    <button type="button" class="btn btn-sm ms-auto btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"
                        style="fill:white">
                            <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M37,26H26v11h-2V26H13v-2h11V13h2v11h11V26z"></path>
                        </svg>
                    </button>
                </div>
                <table class="table table-responsive">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>User</th>
                        <th>Is Done</th>
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
                            <td></td>
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
    {{-- Modal Tambah --}}  
    <!-- Modal -->
    <div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>
@endsection
