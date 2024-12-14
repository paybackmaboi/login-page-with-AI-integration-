<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <style>
        body, html {
            height: 100%;
            margin: 0;
            
        }

        .d-flex {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 10px;
            overflow-y: auto;
            position: fixed;
            top: 0;
            bottom: 0;
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
        .container-fluid {
            margin-left: 200px;
            padding: 20px;
            overflow-y: auto;
            height: 100vh;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
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
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 5px 0;
            padding: 20px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
        .sidebar a.active {
            background-color: #007bff; /* Highlight active menu */
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
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('students.index') }}" class="{{ request()->is('students*') ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i> Student Entry
            </a>
            <a href="{{ route('violations.index') }}" class="{{ request()->is('violations*') ? 'active' : '' }}">
                <i class="fas fa-exclamation-triangle"></i> Violation Entry
            </a>
            <a href="{{ route('academic-years.index') }}" class="{{ request()->is('academic-years*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i> Academic Year
            </a>
            <a href="{{ route('programs.index') }}" class="{{ request()->is('programs*') ? 'active' : '' }}">
                <i class="fas fa-book"></i> Program
            </a>
            <a href="{{ route('sections.index') }}" class="{{ request()->is('sections*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Section
            </a>
            <a href="{{ route('record') }}" class="{{ request()->is('record') ? 'active' : '' }}">
                <i class="fas fa-history"></i> Records
            </a>
            <a href="{{ route('welcome') }}" id="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <div class="dashboard-grid">
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to speak text
        function speakText(text) {
            const synth = window.speechSynthesis;
            if (!synth.speaking) {
                const utterThis = new SpeechSynthesisUtterance(text);
                synth.speak(utterThis);
            } else {
                console.log('Speech synthesis is already speaking. Queuing the next message.');
            }
        }

        window.onload = function() {   
            var logoutUrl =  "{{ route('welcome') }}"; 
            // Speech recognition setup
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            
            // Set properties
            recognition.lang = 'en-US'; // Language
            recognition.interimResults = false; // Don't show partial results
            recognition.continuous = true; // Keep listening until stopped
            
            // Start speech recognition when page loads
            recognition.start();
            
            // Listen for results
            recognition.onresult = function(event) {
                const transcript = event.results[event.resultIndex][0].transcript.trim().toLowerCase();
                console.log('Voice recognized:', transcript);
                
                if (transcript.includes('open student menu')) {
                    document.querySelector('a[href="{{ route('students.index') }}"]').click();
                    speakText('Student menu is opened.');
                } else if (transcript.includes('open student entry')) {
                    window.location.href = "{{ route('students.index') }}";
                    speakText('Student entry is opened.');
                } else if (transcript.includes('open violation menu')) {
                    window.location.href = "{{ route('violations.index') }}";
                    speakText('Violation menu is opened.');
                } else if (transcript.includes('open academic menu')) {
                    window.location.href = "{{ route('academic-years.index') }}";
                    speakText('Academic year menu is opened.');
                } else if (transcript.includes('open dashboard menu')) {
                    window.location.href = "{{ route('dashboard') }}";
                    speakText('Dashboard is opened.');
                } else if (transcript.includes('open program menu')) {
                    window.location.href = "{{ route('programs.index') }}";
                    speakText('Program menu is opened.');
                } else if (transcript.includes('open section menu')) {
                    window.location.href = "{{ route('sections.index') }}";
                    speakText('Section menu is opened.');
                } else if (transcript.includes('hello')) {
                    window.location.href = logoutUrl;
                    speakText('Logging out.');
                } else if (transcript.includes('what is your name')) {
                    speakText('My name is Oscar.');
                } else if (transcript.includes('what do you do for a living')) {
                    speakText('I work as a programmer.');
                } else if (transcript.includes('who is oscar')) {
                    let messages = [
                        "I am on a journey to become the best version of myself.",
                        "Embracing challenges, learning from my mistakes, and celebrating my strengths.",
                        "It is a continuous process of self-discovery and growth.",
                        "I am excited to see what I can achieve as I strive for excellence in everything I do."
                    ];
                    speakMessagesSequentially(messages);
                } else {
                    speakText('');
                }
            };

            function speakMessagesSequentially(messages) {
                if (messages.length === 0) return; 
            
                let utterance = new SpeechSynthesisUtterance(messages.shift()); 
                utterance.onend = function () {
                    speakMessagesSequentially(messages);
                };
                window.speechSynthesis.speak(utterance); 
            }

            // Handle recognition errors
            recognition.onerror = function(event) {
                console.error('Speech recognition error detected:', event.error);
            };

            // Start recognition again after it stops
            recognition.onend = function() {
                recognition.start(); // Restart the recognition
            };

            // Add event listeners for manual clicks on each menu item
            document.querySelectorAll('.sidebar a').forEach(function(link) {
                link.addEventListener('click', function() {
                    if (this.id === 'logout-link') {
                        speakText('Logged out.');
                    } else {
                        speakText(this.textContent + ' is opened.');
                    }
                });
            });
        };
    </script>
    @stack('scripts')
</body>
</html>