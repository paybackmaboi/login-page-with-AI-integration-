<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Poppins;
            line-height: 1.6;
            color: #333;
        }
       /* Navigation styles */
.navbar {
    background-color: #081826;
    color: white;
    padding: 1.5rem;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.nav-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo img {
    max-height: 50px;
    width: auto;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 0.5rem;
}

.nav-links li {
    margin: 0;
    position: relative;
}

.nav-links a {
    color: white;
    text-decoration: none;
    padding: 0.8rem 1.5rem;
    border-radius: 5px;
    transition: all 0.3s ease;
}

/* Hover effect with background */
.nav-links a:hover {
    background-color: #1e4b7a;
    color: #ffffff;
}

/* Active state */
.nav-links a.active {
    background-color: #1e4b7a;
    color: white;
}

/* Hide menu toggle by default */
.menu-toggle {
    display: none; /* Hidden by default */
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
}

/* Responsive styles */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        position: absolute;
        top: 80px;
        left: 0;
        background-color: #081826;
        padding: 1rem;
        gap: 0.5rem;
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links li {
        width: 100%;
        text-align: center;
    }

    .nav-links a {
        display: block;
        padding: 1rem;
        width: 100%;
    }

    .nav-links a:hover {
        background-color: #1e4b7a;
    }

    /* Only show menu toggle on mobile */
    .menu-toggle {
        display: block;
    }
}
        /* Contact form styles */
        .contact-form {
            max-width: 500px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 5px 35px rgb(92, 92, 92);
        }
        .form-header {
            background-color: #081826;
            color: white;
            padding: 1rem;
            margin: -1rem -1rem 1rem -1rem;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .form-group textarea {
            height: 100px;
        }
        .submit-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 3px;
        }
        .submit-btn:hover {
            background-color: rgb(13, 53, 13);
        }
        /* Responsive styles */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 60px;
                left: 0;
                background-color: #00008B;
                padding: 1rem;
            }
            .nav-links.active {
                display: flex;
            }
            .nav-links li {
                margin: 0.5rem 0;
            }
            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    
<nav class="navbar">
    <div class="container">
        <div class="nav-content">
            <a href="#" class="logo">
                <img src="bclogo.png" alt="Brand Logo">
            </a>
            <button class="menu-toggle" aria-label="Toggle navigation">☰</button>
            <ul class="nav-links">
                <li><a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">FAQ</a></li>
                <li><a href="{{ route('service') }}" class="{{ request()->routeIs('service') ? 'active' : '' }}">Service</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="contact-form">
            <div class="form-header">
                <h2>Frequently Asked Questions</h2>
            </div>
            <form>
                <div class="form-group">
                    <h4>Question 1: What is the purpose of the Student Violation System?</h4>
                    <p>ANSWER: The Student Violation System aims to efficiently manage and track student violations within an institution by 
                    providing a centralized platform for recording incidents, 
                    generating reports, and ensuring transparency in communication 
                    with students and parents.</p>
                </div>
                <div class="form-group">
                    <h4>Question 2: How are student violations recorded in the system?</h4>
                    <p>ANSWER: Violations can be recorded manually by authorized personnel such as teachers or 
                    administrators through a form where details like the student's name, 
                    violation type, and date of the incident are entered.</p>
                </div>
                <div class="form-group">
                    <h4>Question 3: Can the system notify parents about student violations?</h4>
                    <p>ANSWER HERE: Yes, the system can send automated notifications to parents via email or SMS, 
                    informing them about their child's reported violations, ensuring timely 
                    communication and awareness.</p>
                </div>
                <div class="form-group">
                    <h4>Question 4: Who has access to the data in the Student Violation System?</h4>
                    <p>ANSWER HERE: Access to the system is restricted to authorized personnel, such as 
                    administrators and designated staff members, ensuring data security and 
                    confidentiality.
                    </p>
                </div>
                <div class="form-group">
                    <h4>Question 5: Is the system customizable for different school policies?</h4>
                    <p>ANSWER HERE: Yes, the system is highly customizable to adapt to various school policies, 
                    allowing administrators to define violation categories, set rules, and 
                    tailor reports to meet specific institutional needs.</p>
                </div>
                <div class="form-group">
                    <h4>Question 6: Does the system support multiple user roles?</h4>
                    <p>ANSWER HERE: Yes, the system supports multiple user roles, such as administrators, teachers, and staff, 
                    each with specific permissions to ensure that only 
                    authorized individuals can perform certain actions.</p>
                </div>
                <div class="form-group">
                    <h4>Question 7: Can students access their violation records?</h4>
                    <p>ANSWER HERE: Depending on the institution's policy, students may have limited 
                    access to view their own violation records through a student portal, 
                    promoting accountability and awareness of their actions.
                    </p>
                </div>
                <div class="form-group">
                    <h4>Question 8: How does the system ensure data security?</h4>
                    <p>ANSWER HERE: The system employs encryption, secure login methods, and regular data backups 
                    to protect sensitive information from unauthorized access or data loss.</p>
                </div>
                <div class="form-group">
                    <h4>Question 9: What kind of reports can the system generate?</h4>
                    <p>ANSWER HERE: The system can generate detailed reports on violation trends, individual student records, 
                    and summary statistics, providing valuable insights for disciplinary actions and policy improvements.</p>
                </div>
                <div class="form-group">
                    <h4>Question 10: Is the system mobile-friendly or accessible on different devices?</h4>
                    <p>ANSWER HERE: Yes, the Student Violation System is designed to be mobile-friendly, 
                    ensuring that it can be accessed on desktops, laptops, tablets, and smartphones for ease of use across various devices.</p>
                </div>
            </form>
            <h4>Didn't find any answers to your questions? Contact Us.</h4>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');

            menuToggle.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        });
    </script>
</body>
</html>