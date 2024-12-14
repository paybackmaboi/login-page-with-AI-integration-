@extends('layouts.app')

@section('content')
<div id="dashboard-grid" class="dashboard-grid">
    <div class="dashboard-item">
        <h3>Academic Year/Semester</h3>
        <p>{{ $activeAcademicYear ? $activeAcademicYear->ay_code : 'No Active Year' }}</p>
    </div>
    <div class="dashboard-item">
        <h3>Total Students</h3>
        <p>{{ $totalStudents }}</p>
    </div>
    <div class="dashboard-item">
        <h3>Total Violations</h3>
        <p>{{ $totalViolations }}</p>
    </div>
    <div class="dashboard-item">
        <canvas id="statisticsChart" width="400" height="200"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('statisticsChart').getContext('2d');
        const statisticsChart = new Chart(ctx, {
            type: 'bar', // You can change this to 'pie', 'line', etc.
            data: {
                labels: ['Total Students', 'Total Violations'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $totalStudents }}, {{ $totalViolations }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // Color for students
                        'rgba(255, 99, 132, 0.2)'  // Color for violations
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
