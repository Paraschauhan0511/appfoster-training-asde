<div class="container">
    <h1>Student Details</h1>
    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Created At:</strong> {{ $student->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $student->updated_at }}</p>

    <!-- You can add more fields as needed -->
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Student List</a>
</div>