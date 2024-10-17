<div class="container">
    <h1>Projects for {{ $student->name }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    <!-- Edit Project Button -->
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>

                    <!-- Delete Project Button -->
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>