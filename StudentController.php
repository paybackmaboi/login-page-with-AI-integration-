<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Program;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $programs = Program::all();
        $sections = Section::all();
        return view('students.index', compact('students', 'programs', 'sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_no' => 'required|unique:students',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'program_id' => 'required|exists:programs,id',
            'section_id' => 'required|exists:sections,id',
            'address' => 'nullable',
            'contact_no' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            try {
                $path = $request->file('photo')->store('photos', 'public');
                $validated['photo_url'] = $path;
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to upload photo.'], 500);
            }
        }

        Student::create($validated);

        return response()->json(['message' => 'Student added successfully.']);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'student_no' => 'required|unique:students,student_no,' . $student->id,
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'program_id' => 'required|exists:programs,id',
            'section_id' => 'required|exists:sections,id',
            'address' => 'nullable',
            'contact_no' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            try {
                $path = $request->file('photo')->store('photos', 'public');
                $validated['photo_url'] = $path;
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to upload photo.'], 500);
            }
        }

        $student->update($validated);

        return response()->json(['message' => 'Student updated successfully']);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}