<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Carbon;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::get();
        $students = Student::all();
        $academicYears = AcademicYear::all();

        // Determine the active academic year using the status column
        $activeAcademicYear = AcademicYear::where('status', 'OPEN')->first();

        return view('violations.index', compact('violations', 'students', 'academicYears', 'activeAcademicYear'));
    }

    public function store(Request $request)
    {   

        $validated = $request->validate([
            'student_no' => 'required|exists:students,student_no',
            'academic_year_id' => 'required|exists:academic_years,id',
            'violation' => 'required',
            'sanction' => 'required',
            'type' => 'required',
            'date' => 'required|date',
        ]);

        $getStudent = Student::where('student_no', $validated['student_no'])->first();
        $data['student_id'] = $getStudent->student_id;
        $data['academic_year_id'] = $validated['academic_year_id'];
        $data['violation'] = $validated['violation'];
        $data['sanction'] = $validated['sanction'];
        $data['type'] = $validated['type'];
        $data['violation'] = $validated['violation'];
        $data['date'] = $validated['date'];
        // try {
            Violation::create($data);
            return response()->json(['success' => 'Violation added successfully.']);
        // } catch (\Exception $e) {
        //     \Log::error('Error adding violation:', ['error' => $e->getMessage()]);
        //     return response()->json(['error' => 'Error adding violation'], 500);
        // }
    }

    public function search(Request $request)
    {
        $term = $request->get('term');
        $students = Student::where('last_name', 'LIKE', "%{$term}%")
                            ->orWhere('first_name', 'LIKE', "%{$term}%")
                            ->get(['id', 'student_no', 'last_name', 'first_name', 'program_id', 'section_id']);
        
        return response()->json($students);
    }
}