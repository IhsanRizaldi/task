<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register || Task</title>
  </head>
  <body class="bg-primary">
    <div class="container">
        <div class="row mt-5 align-items-center justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="mb-1">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            @error('name')
                                <div class="mt-3">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="mb-1">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            @error('email')
                                <div class="mt-3">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="mb-1">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            @error('password')
                                <div class="mt-3">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="mb-1">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            @error('password_confirmation')
                                <div class="mt-3">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="mb-1">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <div class="mb-1">
                            <p>Sudah Punya Akun ? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
