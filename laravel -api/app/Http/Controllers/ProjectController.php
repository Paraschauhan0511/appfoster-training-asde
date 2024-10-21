<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Show all projects for a student
    public function index($studentId)
    {
        $student = Student::findOrFail($studentId); // Find the student by ID
        $projects = $student->projects; // Get all projects for this student

        return view('projects.index', compact('student', 'projects'));
    }

    // Show the form to create a new project
    public function create($studentId)
    {
        return view('projects.create', ['student_id' => $studentId]);
    }

    // Store a newly created project
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'student_id' => 'required|exists:students,id',
        ]);

        Project::create($request->all());

        return redirect()->route('students.projects', $request->student_id)->with('success', 'Project created successfully.');
    }
    public function showProjects($studentId)
    {
        // Find the student by ID
        $student = Student::findOrFail($studentId);

        // Assuming there's a relationship between Student and Project
        // Retrieve the projects for that student
        $projects = $student->projects;

        // Return the view with the student and their projects
        return view('projects.index', compact('student', 'projects'));
    }




    // Additional methods can be added for editing and deleting projects
}
