<!-- resources/views/students/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table {
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">User List</h1>
        <input type="text" id="search" class="form-control mb-3" placeholder="Search by name or email" onkeyup="filterTable()">

        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                  <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <!-- View Button -->
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>

                    <!-- Edit Button -->
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                     <!--Projects Button-->
                    <a href="{{ route('students.projects', $student->id) }}" class="btn btn-primary">Project</a>

                    <!-- Delete Button -->
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                    </form>
                </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="studentModal{{ $student->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Student Details: {{ $student->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>ID:</strong> {{ $student->id }}</p>
                                <p><strong>Name:</strong> {{ $student->name }}</p>
                                <p><strong>Username:</strong> {{ $student->username }}</p>
                                <p><strong>Email:</strong> {{ $student->email }}</p>
                                <p><strong>Address:</strong> {{ $student->address }}</p>
                                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                                <p><strong>Company Name:</strong> {{ $student->company_name }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $students->links() }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function filterTable() {
        let input = document.getElementById('search');
        let filter = input.value.toLowerCase();
        let table = document.querySelector('table');
        let tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');
            let txtValue = '';
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue += td[j].textContent || td[j].innerText;
                }
            }
            tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
        }
    }
    </script>
</body>
</html>

