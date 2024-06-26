<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $students = Student::paginate(10);
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('students.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email', 
            'phone' => 'required|numeric'
        ]);

        // Create a new student record
        Student::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate data
        $this->validate($request, [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);

        // Find student id and update it
        $student = Student::find($id);
        $student->update($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
{
    // Find the existing student record and delete it
    $student = Student::find($id);
    
    if (!$student) {
        return redirect()->route('students.index')
                         ->with('error', 'Student not found.');
    }

    $student->delete();

    // Redirect to the index page with a success message
    return redirect()->route('students.index')
                     ->with('success', 'Student deleted successfully.');
}

}