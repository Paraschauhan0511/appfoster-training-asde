<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Enter New User Details</h3>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
          <div class="col-md-10 d-flex justify-content-end">
            <a href="{{route('users.index')}} " class="btn btn-dark" >Back</a>
        </div>
            <div class="col-md-10">
                <div class="card my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">New User</h3>
                    </div>
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="h5">Name</label>
                                <input type="text"
                                    class=" @error('name') is-invalid      
                                @enderror form-control form-control-lg "
                                    placeholder="Enter your Name" name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="h5">Username</label>
                                <input value="{{old('username')}}" type="text" class=" @error('username') is-invalid
                                  
                                @enderror form-control form-control-lg"
                                    placeholder="Enter your Username" name="username">
                                @error('username')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="h5">Phone</label>
                                <input value="{{old('phone')}}" type="text" class="form-control form-control-lg" placeholder="Enter your No."
                                    name="phone">
                            </div>
                            <div class="mb-3">
                                <label class="h5">E-mail</label>
                                <input value="{{old('email')}}"  type="email" class=" @error('email') is-invalid
                                  
                                @enderror form-control form-control-lg"
                                    placeholder="Enter your e-mail" name="email">
                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="h5">Website</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Enter your Website" name="website">
                            </div>
                            <div class="mb-3">
                                <label class="h5">Company Name</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Enter your Company Name" name="companyname">
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
