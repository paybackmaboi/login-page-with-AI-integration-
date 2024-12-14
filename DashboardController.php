<?php

namespace App\Http\Controllers;
use App\Models\AcademicYear;
use App\Models\Student;
use App\Models\Violation;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the active academic year
        $activeAcademicYear = AcademicYear::where('status', 'OPEN')->first();

        // Count total students
        $totalStudents = Student::count();

        // Count total violations in the active academic year
        $totalViolations = 0;
        if ($activeAcademicYear) {
            $totalViolations = Violation::where('academic_year_id', $activeAcademicYear->id)->count();
        }

        return view('dashboard', compact('activeAcademicYear', 'totalStudents', 'totalViolations'));
    }
}
