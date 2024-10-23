<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Edit Project for User {{ $user->id }}</h3>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('projects.list', $user->id) }} " class="btn btn-dark">Back</a>
            </div>
            <div class="col-md-10">
                <div class="card my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Edit Project Details</h3>
                    </div>
                    <form action="{{ route('projects.update', [$user->id, $project->id]) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="h5">Project Title</label>
                                <input value="{{ old('title', $project->title) }}" type="text"
                                    class="@error('title') is-invalid
                                    @enderror form-control form-control-lg "
                                    placeholder="Enter project Title" name="title">
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="h5">Body</label>
                                <textarea placeholder="Describe your Project" class="form-control" name="body" cols="30" rows="10">{{ old('body', $project->body) }}</textarea>
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary">Update Project</button>
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
