<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{

    public function ajaxDisplay()
    {
        $students = DB::table('students')
            ->join('genders', 'students.gender', '=', 'genders.id')
            ->select('students.*', 'genders.description AS gender_d')
            ->paginate(5);
            // dd($students);
        return response()->json($students, 200);
    }
    // Display a listing of the resource.
    public function index()
    {
        $perPage = 5;

        $students = DB::table('students')
            ->join('genders', 'students.gender', '=', 'genders.id')
            ->select('students.*', 'genders.description AS gender_d')
            ->paginate($perPage);
            // dd($students);
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
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
            'gender' => 'required',
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
