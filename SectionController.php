<?php


namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Program;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $programs = Program::all();
        return view('sections.index', compact('sections', 'programs'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'section_name' => 'required|unique:sections,section_name,NULL,id,program_id,' . $request->program_id,
        'program_id' => 'required|exists:programs,id',
    ]);

    Section::create($validated);

    return response()->json(['message' => 'Section added successfully.']);
}

    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'section_name' => 'required',
            'program_id' => 'required|exists:programs,id',
        ]);

        $section->update($validated);

        return response()->json(['message' => 'Section updated successfully.']);
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return response()->json(['message' => 'Section deleted successfully.']);
    }
}