@extends('master.index')
@section('main')
    <div class="container">
        @if ($message = Session::get('sukses'))
            <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mt-5 justify-content-center text-center">
            <div class="col-md-12 ">
                <h1 >Selamat Datang Di Per Task an Duniawi</h1>
            </div>
        </div>
    </div>
@endsection
