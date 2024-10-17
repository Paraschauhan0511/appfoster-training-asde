<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function list()
    {
        return Student::all();
    }

   
    public function index()
    {
        $students = Student::paginate(10); 
        return view('students.index', compact('students'));
    }

    // Show the form for editing the specified student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function showProjects($id)
    {
        $student = Student::findOrFail($id);
        // Assuming the Student model has a relation to Project
        $projects = $student->projects; // Adjust according to your relationship

        return view('students.projects', compact('student', 'projects'));
    }
   
    // Remove the specified student from storage
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    // Show the specified student
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }
    // StudentController.php

    public function update(Request $request, $id)
   {
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        // Add other validation rules as needed
    ]);

    // Find the student by ID
    $student = Student::findOrFail($id);

    // Update the student's details
    $student->name = $request->input('name');
    $student->email = $request->input('email');
    // Update other fields as needed

    // Save the changes
    $student->save();

    // Redirect back with a success message
    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
  }



}
