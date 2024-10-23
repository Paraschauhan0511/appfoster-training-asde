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
        <h3 class="text-white text-center">Users List</h3>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('users.create') }} " class="btn btn-success">Add New User</a>
            </div>
            @if (Session::has('success'))
                <div class="col-md-12 mt-4">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card  my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Company Name</th>
                                <th>Action</th>
                            </tr>
                            @if ($users->isNotEmpty())
                                @foreach ($users as $index=> $user)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->website }}</td>
                                        <td>{{ $user->companyname }}</td>
                                        <td>
                                            <div class="d-flex">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary me-2">Edit</a>
                                            <a href="{{route('projects.list', $user->id)}}" class="btn btn-primary me-2">View</a>
                                            <a href="#" onclick="deleteUser({{ $user->id }})"
                                                class="btn btn-danger">Delete</a>
                                            <form id="delete-user-from-{{ $user->id }}"
                                                action="{{ route('users.delete', $user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
    function deleteUser(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById("delete-user-from-" + id).submit();

        }

    }
</script>
