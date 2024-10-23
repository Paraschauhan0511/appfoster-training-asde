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
        <h3 class="text-white text-center">Project List Of {{ $user->name }} </h3>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            @if (Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card  my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Projects Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>S.No</th>

                                <th>title</th>
                                <th>body</th>
                                <th>Action</th>
                            </tr>
                            @if ($projects->isNotEmpty())
                                @foreach ($projects as $index => $project)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->body }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('projects.edit', [$user->id, $project->id]) }}"
                                                    class="btn btn-secondary me-2">Edit</a>
                                                <a href="#" onclick="deleteProject({{ $project->id }})"
                                                    class="btn btn-danger">Delete</a>
                                                <form id="delete-project-from-{{ $project->id }}"
                                                    action="{{ route('projects.delete', [$user->id, $project->id]) }}"
                                                    method="post">
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
            <div class="text-center">
                <a href="{{ route('projects.create', $user->id) }} " class="btn btn-success">Add More Project</a>

                <a href="{{ route('users.index') }} " class="btn btn-dark">Back</a>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
</body>

</html>

<script>
    function deleteProject(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById("delete-project-from-" + id).submit();

        }

    }
</script>
