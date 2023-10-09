@extends('master.index')
@section('main')
<div class="row mt-5 justify-content-center">
    <div class="col-md-8">
        <div class="d-flex">
            <h1>Edit Tasks</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('task.update',$task->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3">Name Task</div>
                        <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">Description</div>
                        <textarea name="description" class="form-control" cols="30" rows="10">{{ $task->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
