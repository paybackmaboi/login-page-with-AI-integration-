<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BC Violation System</title>
    <link rel="icon" href="./bclogo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Poppins;
            scroll-behavior: smooth;
        }

        body{
            background-color: #253C59;
        }

        /* Login Form CSS */

        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.5); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #081826;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888; 
            width: 450px;
            max-height: 80%;
            border-radius: 10px;
            overflow-y: auto;
            box-sizing: border-box;
        }

        #foRGOT {
            justify-content: center;
            margin-top: 15px;
            margin-bottom: 15px;
            color: white;
            display: flex;
        }

        .modal-content h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0px 40px;
            margin: auto;
            width: auto;
            height: auto;
        }

        label {
            color: #fff;
            margin: 10px 0 5px;
            padding-left: 5px;
        }

        input {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #000000;
            border-radius: 25px;
            width: 100%;
            box-sizing: border-box;
        }

        .logbttn {
            background-color: #0044CC;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 55%;
            margin: 15px auto 0 auto;
            box-sizing: border-box;
            justify-content: center;
        }

        .logbttn a {
            text-decoration: none;
            color: white;
        }

        .logbttn:hover {
            background-color: #76df84;
            border-radius: 25px;
        }

        #navbar{
            width: auto;
            margin: auto;
            padding: 0px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #081826;
        }

        .logo{
            width: 85px;
            cursor: pointer;
            padding: 5px;
        }

        #navbar ul li{
            font-weight: bold;
            list-style: none;
            display: inline-block;
            margin: 13px 15px;
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
        }

        #navbar ul li a{
            text-decoration: none;
            color: #fff;
            text-transform: uppercase;
            cursor: pointer;
        }

        #navbar ul li:after{
            content: '';
            height: 3px;
            width: 0;
            background: #72a5e2;
            position: absolute;
            left: 0;
            bottom: -5px;
            text-transform: uppercase;
            transition: 0.2s;
        }

        #navbar ul li:hover:after {
            width: 100%;
        }

        #navbar h3 {
            color: #fff;
            margin-left: 20px;
            flex: 1;
            text-align: left;
        }

        .bTTn {
            color: white;
            border: none;
            background-color: inherit;
            padding: 13px 23px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            cursor: pointer;
        }

        button:hover {
            cursor: pointer;
            transform: scale(1.15);
        }

        .section1 {
            text-align: center;
            color: #ffffff;
            background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.90) 100%), url('bcccc.jpg');
            background-position: center;
            background-size: cover;
            padding: 50px 15px;
            background-attachment: fixed;
        }

        .section1 h1 {
            font-size: 50px;
            margin: 25px;
        }

        .section1 p {
            margin: 45px;
            font-size: 20px;
            font-weight: 100;
            
        }

        .bttn, .bttn a {
            margin: 15px;
            padding: 15px;
            color: white;
            text-decoration: none;
        }

        #bttN {
            width: 200px;
            padding: 15px 0;
            text-align: center;
            margin: 20px 10px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 15px;
            border: 2px solid #fff;
            background: transparent;
            color: #fff;
        }

        #section2 {
            padding: 40px 15px;
            text-align: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('section2Background.jpg');
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            color: #ffffff;
        }

        .sectionHeader {
            color: #ffffff;
            margin-bottom: 30px;
        }

        .sectionHeader h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .sectionHeader p {
            font-size: 1.2em;
        }


        .gridcontaineR {
            width: auto;
            margin: 30px auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 25px;
            padding: 20px;
            max-width: 1200px;
        }

        .gridcontainer1, .gridcontainer2 { 
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(5px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gridcontainer1:hover, .gridcontainer2:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .gridcontainer1 h1, .gridcontainer2 h1 {
            color: #ffffff;
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        .gridcontainer1 p, .gridcontainer2 p {
            color: #f0f0f0;
            font-size: 1em;
            line-height: 1.6;
        }
        /* Scroll Reveal Effect */
        .reveal {
            position: relative;
            transform: translateY(150px);
            opacity: 0;
            transition: all 2s ease;
        }

        .reveal.active {
            transform: translateY(0px);
            opacity: 1;
        }


        .section3 {
            width: auto;
            height: auto;
            position: center;
            text-align: center;
            color: #fff;
            padding: 50px;
            background-image: url(section3Background.jpg);
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            box-shadow: 0 5px 35px rgb(10, 131, 212);
        }

        .sectionHeader2 h1 {
            font-size: 50px;
            margin: 20px;
            padding-top: 15px;
        }

        .sectionHeader2 h4 {
            margin: 20px;
            font-weight: 100;
            text-align: center;
        }

        .textBoxcontainer {
            display: flex;
            padding: 15px;
            margin: 25px;
            justify-content: space-around;
            color: #000;
        }

        #gridContainer {
            max-width: 1200px;
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 55px;
            grid-row-gap: 25px;
        }

        .grid1 h3, .grid1 h4, .grid1 p, .grid2 h3, .grid2 h4, .grid2 p, .grid3 h3, .grid3 h4, .grid3 p {
            padding: 15px;
            margin: 8px;
            text-align: left;
        }

        .grid1 { background-color: skyblue; border-radius: 8px; }
        .grid2 { background-color: rgb(235, 225, 135); border-radius: 8px; }
        .grid3 { background-color: aquamarine; border-radius: 8px; }

        footer {
            background-color: #232525;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .upIcon {
            color: white;
            text-decoration: none;
        }

        .section3 i {
            transform: translateX(0px);
            animation: float 5s ease-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        .footer-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .contact-info {
            text-align: left;
        }

        footer h3 {
            font-size: 20px;
        }

        footer h4 {
            padding: 20px;
        }

        footer p {
            font-size: 14px;
            margin: 5px 0;
        }

        .footer-social a {
            font-size: 24px;
            color: #fff;
            margin: 0 10px;
        }

        .footer-rights a {
            color: #fff;
            margin: 0 5px;
            text-decoration: none;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 1024px) {
            .gridcontaineR {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 25px;
            }

            #gridContainer {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            #navbar {
                flex-direction: column;
            }

            .bTTn {
                margin-bottom: 20px;
            }

            .section1 h1 {
                font-size: 30px;
            }

            .section2 h1 {
                font-size: 30px;
            }

            .gridcontaineR {
                grid-template-columns: 1fr;
            }
            .gridcontainer1, .gridcontainer2 {
                margin-bottom: 20px;
            }
            .gridcontaineR {
                grid-template-columns: 1fr;
            }

            #section2 {
                padding: 30px 10px;
            }

            .sectionHeader h1 {
                font-size: 2em;
            }

            .gridcontainer1 h1, .gridcontainer2 h1 {
                font-size: 1.5em;
            }
        }

        @media (min-width: 481px) {
            .footer-container {
                flex-direction: row;
                justify-content: space-between;
                padding: 20px;
            }

            .footer-social, .footer-rights, .contact-info {
                flex: 1;
            }

            .footer-rights {
                text-align: right;
            }

            footer p, footer a {
                font-size: 16px;
            }
        }

        @media (max-width: 480px)  {
            #navbar ul {
                flex-direction: column;
                align-items: center;
            }

            .gridcontaineR {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 25px;
            }

            #gridContainer {
                display: grid;
                grid-template-columns: 1fr;
                align-items: center;
                justify-content: center;
                gap: 15px;
            }

            footer h3 {
                font-size: 18px;
            }

            footer p {
                font-size: 12px;
            }

            .footer-social a {
                font-size: 22px;
            }

            .contact-info {
                text-align: center;
            }
        }

        @media (max-width: 375px) {
            .modal-content {
                width: 95%;
            }

            .logbttn {
                width: 80%;
            }

            form {
                padding: 0px 15px;
            }

            input {
                font-size: 12px;
                padding: 6px;
            }
        }

        @media (max-width: 320px) {
            #navbar {
                flex-direction: column;
            }
            #navbar h3, .section1 h1 {
                font-size: 24px;
            }

            #navbar ul li {
                margin: 5px;
            }

            .section1 p {
                font-size: 14px;
            }

            .gridcontaineR {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 25px;
            }

            #gridContainer {
                display: grid;
                grid-template-columns: 1fr;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .gridcontainer1 h1, .gridcontainer2 h1 {
                font-size: 20px;
            }

            .gridcontainer1 p, .gridcontainer2 p {
                font-size: 14px;
            }
   
            #bTTn {
                margin: 15px;
            }

            footer h3 {
                font-size: 16px;
            }

            footer h4 {
                font-size: 12px;
            }

            footer p {
                font-size: 10px;
            }

            .footer-social a {
                font-size: 20px;
            }

            .footer-rights a {
                font-size: 12px;
            }
        }

        .modal-content div {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <!-- Login Modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Login</h1>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            <form id="login-form" method="POST">
                @csrf
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="logbttn">Login</button>
            </form>

            <a href="#" id="forgot"><p>Forgot your password?</p></a>
        </div>
    </div>

<div id="navbar">
    <img src="bclogo.png" class="logo">
    <h3>Student Violation System</h3>
    <ul class="nav-links">
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="{{ route('service') }}">Service</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
    </ul>
</div>

    <section class="section1">
        <h1>STUDENT VIOLATION SYSTEM</h1>
        <p>
            The Student Violation System is a digital platform developed to efficiently manage and track 
            student misconduct within educational institutions.
            <br>The system typically includes features for logging offenses, 
            notifying involved parties, and generating reports to ensure compliance with school 
            policies and promote a positive learning environment.
        </p>
        <div class="bttn">
            <button id="bttN"><a href="#">More Info</a></button>
        </div>
    </section>

    <section id="section2">
        <div class="revealContent reveal"></div>
        <div class="sectionHeader">
            <h1>HERE'S WHAT YOU NEED TO KNOW</h1>
            <p>Please take time to read.</p>
        </div>
        <div class="gridcontaineR">
            <div class="gridcontainer1">
                <h1>OVERVIEW</h1>
                <p>The Student Violation System offers core features such as easy violation logging, where 
                    incidents of misconduct are recorded and categorized accurately. 
                    It allows for penalty assignment, ensuring appropriate disciplinary 
                    actions are taken based on the infraction. 
                    Automated notifications keep students, parents, 
                    and staff informed about violations and consequences.</p>
            </div>
            <div class="gridcontainer2">
                <h1>BENEFITS</h1>
                <p>Using the Student Violation System offers significant advantages, including improved 
                transparency by providing a clear and accessible record of all disciplinary actions taken.
                This ensures that students, parents, and staff are well-informed and can 
                trust the fairness of the process. It also streamlines administrative tasks,
                saving time and reducing errors in managing student conduct.</p>
            </div>
        </div>
        </div>
    </section>

    <section class="section3">
        <div class="sectionHeader2">
            <h1>Do You Have Questions?</h1>
            <h4>Below you'll find answers to the most common questions you may have on 
                Student Violation System. If you can't still find the answer you're looking for,
            just contact us!</h4>
        </div>
        <div class="textBoxcontainer">
            <div id="gridContainer">
                <div class="grid1">
                    <h3>FAQ 1</h3>
                    <h4>Who can access the Student Violation System?</h4>
                    <p>Access to the system is typically restricted to authorized personnel, such as faculty members, school administrators, and sometimes students. 
                    Permissions are assigned based on user roles to ensure privacy and security.</p>
                </div>
                <div class="grid2">
                    <h3>FAQ 2</h3>
                    <h4>Can students see their violation records?</h4>
                    <p>Depending on the system's configuration, students may be able to view their records. 
                    This feature, if enabled, allows students to monitor their own behavior records and take necessary corrective actions.</p>
                </div>
                <div class="grid3">
                    <h3>FAQ 3</h3>
                    <h4>What should i do if i encounter a technical issue with the system?</h4>
                    <p>For technical support, users should contact the IT support team or submit a help request through the system. Most issues can be resolved within a short period.</p>
                </div>
            </div>
        </div>
        <a href="#navbar" class="upIcon"><i class='bx bx-chevrons-up bx-lg'></i></a>
    </section>
    <footer>
        <div class="footer-container">
            <div class="contact-info">
                <h3>Contact Us</h3>
                <p>Benedicto College</p>
                <p>A.S Fortuna Street, Brgy. Bakilid, Mandaue City</p>
                <p>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e486818a81808d87908b878b8888818381a48389858d88ca878b89">[email&#160;protected]</a></p>
                <p>Phone: (123) 456-7890</p>
            </div>
            <div class="footer-social">
                <h3>Follow Us</h3>
                <a href="https://www.facebook.com"><i class='bx bxl-facebook-circle bx-md'></i></a>
                <a href="https://x.com"><i class='bx bxl-twitter bx-md'></i></a>
                <a href="https://www.linkedin.com"><i class='bx bxl-linkedin-square bx-md'></i></a>
                <a href="https://www.instagram.com"><i class='bx bxl-instagram bx-md'></i></a>
            </div>
            <div class="footer-rights">
                <p>© 2024 Benedicto College. All rights reserved.</p>
                <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
            </div>
        </div>
        <hr>
        <h4>Images designed by Freepik</h4>
    </footer>
    
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

