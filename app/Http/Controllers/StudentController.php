<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|in:9,10,11,12',
        ]);

        Student::create([
            'name' => $request->name,
            'class' => $request->class,
            'status' => 1, 
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|in:9,10,11,12',
            'status' => 'required|boolean',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'class' => $request->class,
            'status' => $request->status,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }
    
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
