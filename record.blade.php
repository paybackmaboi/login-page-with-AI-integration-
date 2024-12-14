@extends('layouts.app')

@section('content')
<div class="record-filter">
    <form method="GET" action="{{ route('record') }}">
        <div class="form-group">
            <label for="academicYear">Filter by Academic Year</label>
            <select class="form-control" id="academicYear" name="academic_year_id" onchange="this.form.submit()">
                <option value="">Select Academic Year</option>
                @foreach($academicYears as $year)
                    <option value="{{ $year->id }}" {{ $selectedYear == $year->id ? 'selected' : '' }}>
                        {{ $year->ay_code }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
</div>

<div class="record-table">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student No</th>
                <th>Full Name</th>
                <th>Program</th>
                <th>Section</th>
                <th>Violation</th>
                <th>Sanction</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($violations as $violation)
            <tr>
                <td>{{ $violation->student->student_no }}</td>
                <td>{{ $violation->student->last_name }}, {{ $violation->student->first_name }}</td>
                <td>{{ $violation->student->program->pcode }}</td>
                <td>{{ $violation->student->section->section_name }}</td>
                <td>{{ $violation->violation }}</td>
                <td>{{ $violation->sanction }}</td>
                <td>{{ $violation->type }}</td>
                <td>{{ $violation->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection