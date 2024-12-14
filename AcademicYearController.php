<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();
        $activeAcademicYear = AcademicYear::where('status', 'OPEN')->first();
        return view('academic_years.index', compact('academicYears', 'activeAcademicYear'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ay_code' => 'required|unique:academic_years',
            'year_from' => 'required|integer',
            'year_to' => 'required|integer',
            'semester' => 'required',
        ]);

        // Close any currently open academic year
        AcademicYear::where('status', 'OPEN')->update(['status' => 'CLOSE']);

        // Create the new academic year and set it to open
        $validated['status'] = 'OPEN';
        AcademicYear::create($validated);

        return response()->json(['message' => 'Academic Year added successfully.']);
    }

    public function update(Request $request, AcademicYear $academicYear)
    {
        $validated = $request->validate([
            'ay_code' => 'required|unique:academic_years,ay_code,' . $academicYear->id,
            'year_from' => 'required|integer',
            'year_to' => 'required|integer',
            'semester' => 'required',
        ]);

        $academicYear->update($validated);

        return response()->json(['message' => 'Academic Year updated successfully.']);
    }

    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();

        return response()->json(['message' => 'Academic Year deleted successfully.']);
    }

    public function open($id)
    {
        // Close any currently open academic year
        AcademicYear::where('status', 'OPEN')->update(['status' => 'CLOSE']);

        // Open the selected academic year
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->update(['status' => 'OPEN']);

        return response()->json(['message' => 'Academic Year opened successfully.']);
    }
}