<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding: 10px;
            overflow-y: auto;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 5px 0;
            padding: 8px;
            border-radius: 5px;
            font-size: 14px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }
        .dashboard-grid, .student-entry-table, .academic-year-table, .program-table, .section-table, .violation-entry, .records {
            display: none;
            margin-top: 20px;
        }
        .dashboard-item {
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            color: white;
        }
        .dashboard-item:nth-child(1) {
            background-color: #007bff;
        }
        .dashboard-item:nth-child(2) {
            background-color: #ffc107;
        }
        .dashboard-item:nth-child(3) {
            background-color: #28a745;
        }
        .table-container {
            margin-top: 20px;
        }
        .status-icon {
            color: yellow;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="text-center mb-3">
                <img src="https://via.placeholder.com/40" alt="Profile Picture" class="profile-pic" onclick="editProfile()">
                <p class="mb-0">Admin Name</p>
                <p class="mb-0">Administrator</p>
            </div>
            <a href="#" onclick="showSection('dashboard-grid')" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#" onclick="showSection('student-entry-table')"><i class="fas fa-user-graduate"></i> Student Entry</a>
            <a href="#" onclick="showSection('violation-entry')"><i class="fas fa-exclamation-triangle"></i> Violation Entry</a>
            <a href="#" onclick="showSection('academic-year-table')"><i class="fas fa-calendar-alt"></i> Academic Year</a>
            <a href="#" onclick="showSection('program-table')"><i class="fas fa-book"></i> Program</a>
            <a href="#" onclick="showSection('section-table')"><i class="fas fa-users"></i> Section</a>
            <a href="#" onclick="showSection('records')"><i class="fas fa-folder"></i> Records</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <div id="dashboard-grid" class="dashboard-grid">
                <div class="dashboard-item">
                    <h3>Academic Year/Semester</h3>
                    <p>2019-2020 2ND SEM</p>
                </div>
                <div class="dashboard-item">
                    <h3>Total Students</h3>
                    <p>4</p>
                </div>
                <div class="dashboard-item">
                    <h3>Total Violations</h3>
                    <p>4</p>
                </div>
            </div>


            <div id="student-entry-table" class="student-entry-table table-container">
                <div class="button-group">
                    <button class="btn btn-success" onclick="openStudentModal()">Create New</button>
                    <button class="btn btn-danger" onclick="showSection('dashboard-grid')">Close</button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student No</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Program</th>
                            <th>Section</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <tr>
                            <td>1</td>
                            <td>2019-0003</td>
                            <td>RESARE</td>
                            <td>JOEMEL</td>
                            <td>E</td>
                            <td>BSIT</td>
                            <td>BSIT101</td>
                            <td>SURIGAO CITY</td>
                            <td>09077640336</td>
                            <td><img src="https://via.placeholder.com/40" class="student-photo" style="width: 40px; height: 40px;" onclick="showImageModal(this.src)"></td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editStudent(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteStudent(this)">Delete</button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Student Modal -->
            <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="studentModalLabel">Student Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="studentForm">
                                <div class="form-group">
                                    <label for="studentNo">Student No</label>
                                    <input type="text" class="form-control" id="studentNoInput" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastNameInput" required>
                                </div>
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstNameInput" required>
                                </div>
                                <div class="form-group">
                                    <label for="middleName">Middle Name</label>
                                    <input type="text" class="form-control" id="middleNameInput">
                                </div>
                                <div class="form-group">
                                    <label for="program">Program</label>
                                    <input type="text" class="form-control" id="programInput" required>
                                </div>
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <input type="text" class="form-control" id="sectionInput" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="addressInput">
                                </div>
                                <div class="form-group">
                                    <label for="contactNo">Contact No</label>
                                    <input type="text" class="form-control" id="contactNoInput">
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control-file" id="photoInput" accept="image/*" onchange="previewImage(event)">
                                    <img id="studentPhoto" src="https://via.placeholder.com/40" class="mt-2" style="width: 100px; height: 100px;">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img id="modalImage" src="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div id="violation-entry" class="violation-entry">
                <form class="mb-4">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="searchStudent">Search Student</label>
                            <input type="text" class="form-control" id="searchStudent" placeholder="Search Student">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="studentNo">Student No.</label>
                            <input type="text" class="form-control" id="studentNo" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" readonly>
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
                            <label for="ayCode">AY Code</label>
                            <input type="text" class="form-control" id="ayCode" value="2019-2020 2ND SEM" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="violation">Violation</label>
                            <input type="text" class="form-control" id="violation">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sanction">Sanction</label>
                            <input type="text" class="form-control" id="sanction">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student No</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>AY Code</th>
                            <th>Violation</th>
                            <th>Sanction</th>
                            <th>Type</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2019-0003</td>
                            <td>JOEMEL RESARE</td>
                            <td>BSIT101</td>
                            <td>2019-2020 2ND SEM</td>
                            <td>Sample Violation</td>
                            <td>Sample Sanction</td>
                            <td>Sample Type</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="academic-year-table" class="academic-year-table table-container">
                <div class="button-group">
                    <button class="btn btn-success" data-toggle="modal" data-target="#academicYearModal">Create New</button>
                    <button class="btn btn-danger" onclick="showSection('dashboard-grid')">Close</button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>AY Code</th>
                            <th>Year From</th>
                            <th>Year To</th>
                            <th>Semester</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="academicYearTableBody">
                        <tr>
                            <td>1</td>
                            <td>2019-2020 1ST SEM</td>
                            <td>2019</td>
                            <td>2020</td>
                            <td>1ST SEM</td>
                            <td><span class="status-text">CLOSE</span> <i class="fas fa-folder status-icon" onclick="confirmOpen(this)"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2019-2020 2ND SEM</td>
                            <td>2019</td>
                            <td>2020</td>
                            <td>2ND SEM</td>
                            <td><span class="status-text">OPEN</span> <i class="fas fa-folder-open status-icon" onclick="confirmOpen(this)"></i></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2019-2020 SUMMER</td>
                            <td>2019</td>
                            <td>2020</td>
                            <td>SUMMER</td>
                            <td><span class="status-text">CLOSE</span> <i class="fas fa-folder status-icon" onclick="confirmOpen(this)"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="program-table" class="program-table table-container">
                <div class="button-group">
                    <button class="btn btn-success" onclick="openProgramModal()">Create New</button>
                    <button class="btn btn-danger" onclick="showSection('dashboard-grid')">Close</button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PCode</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="programTableBody">
                        <tr>
                            <td>1</td>
                            <td>BSIT</td>
                            <td>Bachelor of Science in Information Technology</td>
                            <td>College</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editProgram(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteProgram(this)">Delete</button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Section Table -->
            <div id="section-table" class="section-table table-container">
                <div class="button-group">
                    <button class="btn btn-success" onclick="openSectionModal()">Create New</button>
                    <button class="btn btn-danger" onclick="showSection('dashboard-grid')">Close</button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Section ID</th>
                            <th>Section</th>
                            <th>PCode</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="sectionTableBody">
                        <tr>
                            <td>1</td>
                            <td>BSIT101</td>
                            <td>BSIT101</td>
                            <td>BSIT</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editSection(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteSection(this)">Delete</button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>



            <div id="records" class="records">
                <div class="form-group">
                    <label for="filterByAYCode">Filter by AY Code</label>
                    <select class="form-control" id="filterByAYCode">
                        <option>2019-2020 1ST SEM</option>
                        <option>2019-2020 2ND SEM</option>
                        <option>2019-2020 SUMMER</option>
                    </select>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student No</th>
                            <th>Fullname</th>
                            <th>PCode</th>
                            <th>Section</th>
                            <th>Violations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2019-0001</td>
                            <td>RESARE, JOEMEL E</td>
                            <td>BSIT</td>
                            <td>BSIT101</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2019-0002</td>
                            <td>TALIMPROOK, ALEJANDRO JR M</td>
                            <td>BSIT</td>
                            <td>BSIT201</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2019-0003</td>
                            <td>TAN, RAMBOO N</td>
                            <td>ICT</td>
                            <td>G11-CHROME</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>2019-0005</td>
                            <td>HEI, WARE N</td>
                            <td>BSHM</td>
                            <td>HM101</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Violation</th>
                            <th>Sanction</th>
                            <th>Type</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-01-01</td>
                            <td>Sample Violation</td>
                            <td>Sample Sanction</td>
                            <td>Sample Type</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Academic Year Modal -->
    <div class="modal fade" id="academicYearModal" tabindex="-1" aria-labelledby="academicYearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="academicYearModalLabel">Create New Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="academicYearForm">
                        <div class="form-group">
                            <label for="ayCode">AY Code</label>
                            <input type="text" class="form-control" id="ayCodeInput" required>
                        </div>
                        <div class="form-group">
                            <label for="yearFrom">Year From</label>
                            <input type="number" class="form-control" id="yearFromInput" readonly>
                        </div>
                        <div class="form-group">
                            <label for="yearTo">Year To</label>
                            <input type="number" class="form-control" id="yearToInput" readonly>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select class="form-control" id="semesterInput" required>
                                <option>1ST SEM</option>
                                <option>2ND SEM</option>
                                <option>SUMMER</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Program Modal -->
    <div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="programModalLabel">Program Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="programForm">
                        <div class="form-group">
                            <label for="pcode">PCode</label>
                            <input type="text" class="form-control" id="pcodeInput" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="descriptionInput" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="typeInput" required>
                                <option>Junior High</option>
                                <option>SHS</option>
                                <option>College</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Modal -->
    <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sectionModalLabel">Section Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sectionForm">
                        <div class="form-group">
                            <label for="sectionId">Section ID</label>
                            <input type="text" class="form-control" id="sectionIdInput" readonly>
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" class="form-control" id="sectionInput" required>
                        </div>
                        <div class="form-group">
                            <label for="pcode">PCode</label>
                            <input type="text" class="form-control" id="pcodeSectionInput" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to open this academic year?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmYes">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let currentRow;

        function editProfile() {
            alert('Profile editing feature coming soon!');
        }

        function showSection(sectionId) {
            document.querySelectorAll('.dashboard-grid, .student-entry-table, .academic-year-table, .program-table, .section-table, .violation-entry, .records').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }

        // Show dashboard by default
        document.getElementById('dashboard-grid').style.display = 'block';

        // Handle form submission
        document.getElementById('academicYearForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const ayCode = document.getElementById('ayCodeInput').value;
            const yearFrom = document.getElementById('yearFromInput').value;
            const yearTo = document.getElementById('yearToInput').value;
            const semester = document.getElementById('semesterInput').value;

            const tableBody = document.getElementById('academicYearTableBody');

            // Close any currently open academic years
            Array.from(tableBody.rows).forEach(row => {
                if (row.cells[5].querySelector('.status-text').innerText === 'OPEN') {
                    row.cells[5].innerHTML = '<span class="status-text">CLOSE</span> <i class="fas fa-folder status-icon" onclick="confirmOpen(this)"></i>';
                }
            });

            // Add the new academic year as open
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${tableBody.rows.length + 1}</td>
                <td>${ayCode}</td>
                <td>${yearFrom}</td>
                <td>${yearTo}</td>
                <td>${semester}</td>
                <td><span class="status-text">OPEN</span> <i class="fas fa-folder-open status-icon" onclick="confirmOpen(this)"></i></td>
            `;
            tableBody.appendChild(newRow);

            $('#academicYearModal').modal('hide');
            document.getElementById('academicYearForm').reset();
        });

        function confirmOpen(icon) {
            currentRow = icon.closest('tr');
            $('#confirmModal').modal('show');
        }

        document.getElementById('confirmYes').addEventListener('click', function() {
            const tableBody = document.getElementById('academicYearTableBody');

            // Close any currently open academic years
            Array.from(tableBody.rows).forEach(row => {
                if (row.cells[5].querySelector('.status-text').innerText === 'OPEN') {
                    row.cells[5].innerHTML = '<span class="status-text">CLOSE</span> <i class="fas fa-folder status-icon" onclick="confirmOpen(this)"></i>';
                }
            });

            // Open the selected academic year
            currentRow.cells[5].innerHTML = '<span class="status-text">OPEN</span> <i class="fas fa-folder-open status-icon" onclick="confirmOpen(this)"></i>';

            $('#confirmModal').modal('hide');
        });
    </script>

    <script>
        document.getElementById('ayCodeInput').addEventListener('input', function() {
            const ayCode = this.value;
            const yearPattern = /^\d{4}-\d{4}$/;
            
            if (yearPattern.test(ayCode)) {
                const [yearFrom, yearTo] = ayCode.split('-').map(Number);
                
                if (yearTo === yearFrom + 1) {
                    document.getElementById('yearFromInput').value = yearFrom;
                    document.getElementById('yearToInput').value = yearTo;
                } else {
                    alert('Invalid AY Code. The academic year should end in the following year.');
                    this.value = '';
                    document.getElementById('yearFromInput').value = '';
                    document.getElementById('yearToInput').value = '';
                }
            } else {
                document.getElementById('yearFromInput').value = '';
                document.getElementById('yearToInput').value = '';
            }
        });
    </script>

    <script>
        let currentProgramRow = null;

        function openProgramModal() {
            currentProgramRow = null;
            document.getElementById('programForm').reset();
            $('#programModal').modal('show');
        }

        function editProgram(button) {
            currentProgramRow = button.closest('tr');
            const cells = currentProgramRow.cells;
            document.getElementById('pcodeInput').value = cells[1].innerText;
            document.getElementById('descriptionInput').value = cells[2].innerText;
            document.getElementById('typeInput').value = cells[3].innerText;
            $('#programModal').modal('show');
        }

        function deleteProgram(button) {
            if (confirm('Are you sure you want to delete this program?')) {
                const row = button.closest('tr');
                row.remove();
            }
        }

        document.getElementById('programForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const pcode = document.getElementById('pcodeInput').value;
            const description = document.getElementById('descriptionInput').value;
            const type = document.getElementById('typeInput').value;

            if (currentProgramRow) {
                // Update existing program
                const cells = currentProgramRow.cells;
                cells[1].innerText = pcode;
                cells[2].innerText = description;
                cells[3].innerText = type;
            } else {
                // Add new program
                const tableBody = document.getElementById('programTableBody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${tableBody.rows.length + 1}</td>
                    <td>${pcode}</td>
                    <td>${description}</td>
                    <td>${type}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editProgram(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteProgram(this)">Delete</button>
                    </td>
                `;
                tableBody.appendChild(newRow);
            }

            $('#programModal').modal('hide');
            document.getElementById('programForm').reset();
        });
    </script>

    <script>
        let currentSectionRow = null;

        function openSectionModal() {
            currentSectionRow = null;
            document.getElementById('sectionForm').reset();
            $('#sectionModal').modal('show');
        }

        function editSection(button) {
            currentSectionRow = button.closest('tr');
            const cells = currentSectionRow.cells;
            document.getElementById('sectionIdInput').value = cells[1].innerText;
            document.getElementById('sectionInput').value = cells[2].innerText;
            document.getElementById('pcodeSectionInput').value = cells[3].innerText;
            $('#sectionModal').modal('show');
        }

        function deleteSection(button) {
            if (confirm('Are you sure you want to delete this section?')) {
                const row = button.closest('tr');
                row.remove();
            }
        }

        document.getElementById('sectionForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const sectionId = document.getElementById('sectionIdInput').value || `Auto-${Date.now()}`;
            const section = document.getElementById('sectionInput').value;
            const pcode = document.getElementById('pcodeSectionInput').value;

            if (currentSectionRow) {
                // Update existing section
                const cells = currentSectionRow.cells;
                cells[1].innerText = sectionId;
                cells[2].innerText = section;
                cells[3].innerText = pcode;
            } else {
                // Add new section
                const tableBody = document.getElementById('sectionTableBody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${tableBody.rows.length + 1}</td>
                    <td>${sectionId}</td>
                    <td>${section}</td>
                    <td>${pcode}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editSection(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteSection(this)">Delete</button>
                    </td>
                `;
                tableBody.appendChild(newRow);
            }

            $('#sectionModal').modal('hide');
            document.getElementById('sectionForm').reset();
        });
    </script>

<script>
        let currentStudentRow = null;

        function editProfile() {
            alert('Profile editing feature coming soon!');
        }

        function showSection(sectionId) {
            document.querySelectorAll('.dashboard-grid, .student-entry-table, .academic-year-table, .program-table, .section-table, .violation-entry, .records').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }

        // Show dashboard by default
        document.getElementById('dashboard-grid').style.display = 'block';

        function openStudentModal() {
            currentStudentRow = null;
            document.getElementById('studentForm').reset();
            document.getElementById('studentPhoto').src = "https://via.placeholder.com/40";
            $('#studentModal').modal('show');
        }

        function editStudent(button) {
            currentStudentRow = button.closest('tr');
            const cells = currentStudentRow.cells;
            document.getElementById('studentNoInput').value = cells[1].innerText;
            document.getElementById('lastNameInput').value = cells[2].innerText;
            document.getElementById('firstNameInput').value = cells[3].innerText;
            document.getElementById('middleNameInput').value = cells[4].innerText;
            document.getElementById('programInput').value = cells[5].innerText;
            document.getElementById('sectionInput').value = cells[6].innerText;
            document.getElementById('addressInput').value = cells[7].innerText;
            document.getElementById('contactNoInput').value = cells[8].innerText;
            document.getElementById('studentPhoto').src = cells[9].querySelector('img').src;
            $('#studentModal').modal('show');
        }

        function deleteStudent(button) {
            if (confirm('Are you sure you want to delete this student?')) {
                const row = button.closest('tr');
                row.remove();
            }
        }

        document.getElementById('studentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const studentNo = document.getElementById('studentNoInput').value;
            const lastName = document.getElementById('lastNameInput').value;
            const firstName = document.getElementById('firstNameInput').value;
            const middleName = document.getElementById('middleNameInput').value;
            const program = document.getElementById('programInput').value;
            const section = document.getElementById('sectionInput').value;
            const address = document.getElementById('addressInput').value;
            const contactNo = document.getElementById('contactNoInput').value;
            const photoSrc = document.getElementById('studentPhoto').src;

            if (currentStudentRow) {
                // Update existing student
                const cells = currentStudentRow.cells;
                cells[1].innerText = studentNo;
                cells[2].innerText = lastName;
                cells[3].innerText = firstName;
                cells[4].innerText = middleName;
                cells[5].innerText = program;
                cells[6].innerText = section;
                cells[7].innerText = address;
                cells[8].innerText = contactNo;
                cells[9].querySelector('img').src = photoSrc;
            } else {
                // Add new student
                const tableBody = document.getElementById('studentTableBody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${tableBody.rows.length + 1}</td>
                    <td>${studentNo}</td>
                    <td>${lastName}</td>
                    <td>${firstName}</td>
                    <td>${middleName}</td>
                    <td>${program}</td>
                    <td>${section}</td>
                    <td>${address}</td>
                    <td>${contactNo}</td>
                    <td><img src="${photoSrc}" class="student-photo" style="width: 40px; height: 40px;" onclick="showImageModal(this.src)"></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editStudent(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteStudent(this)">Delete</button>
                    </td>
                `;
                tableBody.appendChild(newRow);
            }

            $('#studentModal').modal('hide');
            document.getElementById('studentForm').reset();
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('studentPhoto').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function showImageModal(src) {
            document.getElementById('modalImage').src = src;
            $('#imageModal').modal('show');
        }
    </script>
</body>
</html>