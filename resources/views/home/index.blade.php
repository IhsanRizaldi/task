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
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Sudah</h5>
                        <h5 class="text-success">{{ $complete }}</h5>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Belum</h5>
                        <h5 class="text-danger">{{ $incomplete }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form action="{{ route('home.index') }}" method="get">
                    <div class="d-flex">
                        <input type="text" name="search" class="form-control me-5">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
                <div class="card mt-2">
                    <div class="card-header">
                        <div class="d-flex">
                            <button type="button" class="btn btn-sm ms-auto btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"
                                style="fill:white">
                                    <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M37,26H26v11h-2V26H13v-2h11V13h2v11h11V26z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
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
                                    <td>
                                        @if ($data->is_done == true)
                                            <a href="{{ route('task.update_status',$data->id) }}" class="btn btn-sm btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 -0.5 25 25" fill="none">
                                                    <path d="M5.5 12.5L10.167 17L19.5 8" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                        @else
                                        <a href="{{ route('task.update_status',$data->id) }}" class="btn btn-sm btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 -0.5 25 25" fill="none">
                                                <path d="M6.96967 16.4697C6.67678 16.7626 6.67678 17.2374 6.96967 17.5303C7.26256 17.8232 7.73744 17.8232 8.03033 17.5303L6.96967 16.4697ZM13.0303 12.5303C13.3232 12.2374 13.3232 11.7626 13.0303 11.4697C12.7374 11.1768 12.2626 11.1768 11.9697 11.4697L13.0303 12.5303ZM11.9697 11.4697C11.6768 11.7626 11.6768 12.2374 11.9697 12.5303C12.2626 12.8232 12.7374 12.8232 13.0303 12.5303L11.9697 11.4697ZM18.0303 7.53033C18.3232 7.23744 18.3232 6.76256 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L18.0303 7.53033ZM13.0303 11.4697C12.7374 11.1768 12.2626 11.1768 11.9697 11.4697C11.6768 11.7626 11.6768 12.2374 11.9697 12.5303L13.0303 11.4697ZM16.9697 17.5303C17.2626 17.8232 17.7374 17.8232 18.0303 17.5303C18.3232 17.2374 18.3232 16.7626 18.0303 16.4697L16.9697 17.5303ZM11.9697 12.5303C12.2626 12.8232 12.7374 12.8232 13.0303 12.5303C13.3232 12.2374 13.3232 11.7626 13.0303 11.4697L11.9697 12.5303ZM8.03033 6.46967C7.73744 6.17678 7.26256 6.17678 6.96967 6.46967C6.67678 6.76256 6.67678 7.23744 6.96967 7.53033L8.03033 6.46967ZM8.03033 17.5303L13.0303 12.5303L11.9697 11.4697L6.96967 16.4697L8.03033 17.5303ZM13.0303 12.5303L18.0303 7.53033L16.9697 6.46967L11.9697 11.4697L13.0303 12.5303ZM11.9697 12.5303L16.9697 17.5303L18.0303 16.4697L13.0303 11.4697L11.9697 12.5303ZM13.0303 11.4697L8.03033 6.46967L6.96967 7.53033L11.9697 12.5303L13.0303 11.4697Z" fill="white"/>
                                            </svg>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm ms-auto btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" data-task_id="{{ $data->id }}" data-name="{{ $data->name }}" data-description="{{ $data->description }}" data-is_done="{{ $data->is_done }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                                <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        <a href="{{ route('task.destroy',$data->id) }}" class="btn btn-sm btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                                <path d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="mt-2">
                    {{ $task->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Tambah --}}  
    <!-- Modal -->
    <div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('task.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="mb-2">
                        <label for="">Task Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="">Task Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    {{-- Modal Edit --}}
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('task.update') }}" method="post"> 
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="task_id" id="task_id">
                        <input type="hidden" name="is_done" id="is_done">
                        <div class="mb-2">
                            <label for="name">Task Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="description">Task Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
@endsection

@section('script')
<script>
    $('#exampleModalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var task_id = button.data('task_id');
        var name = button.data('name');
        var description = button.data('description');
        var is_done = button.data('is_done');

        var modal = $(this);
        modal.find('.modal-body input[name="task_id"]').val(task_id);
        modal.find('.modal-body input[name="name"]').val(name);
        modal.find('.modal-body textarea[name="description"]').val(description);
        modal.find('.modal-body input[name="is_done"]').val(is_done);
    });
</script>
@endsection
