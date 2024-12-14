<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pcode' => 'required|unique:programs',
            'description' => 'required',
            'type' => 'required',
        ]);

        $program = Program::create($validated);

        return response()->json($program);
    }




    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'pcode' => 'required|unique:programs,pcode,' . $id,
        'description' => 'required',
        'type' => 'required',
    ]);

    $program = Program::findOrFail($id);
    $program->update($validated);

    return response()->json($program);
}


    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return response()->json(['message' => 'Program deleted successfully.']);
    }
}