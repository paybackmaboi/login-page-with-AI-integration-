@extends('layouts.app')

@section('content')
<div id="violation-entry" class="violation-entry">
    <form class="mb-4" id="violationForm">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="studentSelect">Select Student</label>
                <select class="form-control" id="studentSelect" name="student_id" required>
                    <option value="">-- Select a Student --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" class="studentID"  data-student_no="{{ $student->student_no }}" data-name="{{ $student->last_name }}, {{ $student->first_name }}" data-program="{{ $student->program->pcode }}" data-section="{{ $student->section->section_name }}">
                            {{ $student->last_name }}, {{ $student->first_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="studentNo">Student No</label>
                <input type="text" class="form-control" id="studentNo" name="student_no" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="studentName">Name</label>
                <input type="text" class="form-control" id="studentName" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="program">Program</label>
                <input type="text" class="form-control" id="program" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="section">Section</label>
                <input type="text" class="form-control" id="section" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="academicYearId">Academic Year</label>
                <input type="text" class="form-control" id="academicYearId" value="{{ $activeAcademicYear->ay_code }}" readonly>
                <input type="hidden" name="academic_year_id" value="{{ $activeAcademicYear->id }}">
            </div>
            <div class="form-group col-md-3">
                <label for="violation">Violation</label>
                <input type="text" class="form-control" id="violation" name="violation" required>
            </div>
            <div class="form-group col-md-3">
                <label for="sanction">Sanction</label>
                <input type="text" class="form-control" id="sanction" name="sanction" required>
            </div>
            <div class="form-group col-md-3">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="minor">Minor</option>
                    <option value="major">Major</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <h4 class="mt-4 mb-3">Violations List</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Student No</th>
                <th>AY Code</th>
                <th>Violation</th>
                <th>Sanction</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody id="violationsTableBody">
            @foreach($violations as $violation => $v)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $v->student_no }}</td>
                <td>{{ $v->academicYear->ay_code }}</td>
                <td>{{ $v->violation }}</td>
                <td>{{ $v->sanction }}</td>
                <td>{{ $v->type }}</td>
                <td>{{ $v->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#studentSelect').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            
            
            const studentNo = selectedOption.data('student_no');
            
            const studentName = selectedOption.data('name');
            const program = selectedOption.data('program');
            const section = selectedOption.data('section');

            
            $('#studentNo').val(studentNo);
            $('#studentName').val(studentName);
            $('#program').val(program);
            $('#section').val(section);
        });

        $('#violationForm').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();
            console.log(formData);
            
            
            
            $.ajax({
                url: '{{ route('violations.store') }}',
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.success);
                    location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (const field in errors) {
                            errorMessages += `${errors[field][0]}\n`;
                        }
                        alert('Validation Error:\n' + errorMessages);
                    } else {
                        alert('Error adding violation');
                    }
                }
            });
        });
    });
</script>
@endpush