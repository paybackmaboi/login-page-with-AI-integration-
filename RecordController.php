<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        $academicYears = AcademicYear::all();
        $selectedYear = $request->get('academic_year_id');
        $violations = Violation::when($selectedYear, function ($query, $selectedYear) {
            return $query->where('academic_year_id', $selectedYear);
        })->get();

        $activeAcademicYear = AcademicYear::where('status', 'OPEN')->first();

        return view('record', compact('violations', 'academicYears', 'selectedYear', 'activeAcademicYear'));
    }
}