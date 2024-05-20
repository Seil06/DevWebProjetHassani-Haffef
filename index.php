<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahel Fleet</title>
    <link rel="icon" type="image/png" href="SF-Logo1.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Your CSS styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Quicksand", sans-serif;
        }
        body {
            background: #111;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: space-between;
            scroll-behavior: smooth;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        header {
            text-align: center;
            padding: 100px 0 20px; /* Increased top padding to make space for navbar */
        }
        header img {
            max-width: 100%;
            height: auto; /* Adjust height to auto for proportional scaling */
            width: 300px; /* Increased width for larger image */
            object-fit: cover;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        header img:hover {
            transform: scale(1.1);
        }
        nav {
            background: rgba(34, 34, 34, 0.8); /* Transparent background */
            padding: 10px; /* Reduced padding */
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #007bff;
        }
        nav a::before,
        nav a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: #fff;
            transition: transform 0.5s;
        }
        nav a::before {
            top: 0;
            left: 0;
            transform-origin: right;
            transform: scaleX(0);
        }
        nav a:hover::before {
            transform-origin: left;
            transform: scaleX(1);
        }
        nav a::after {
            bottom: 0;
            left: 0;
            transform-origin: left;
            transform: scaleX(0);
        }
        nav a:hover::after {
            transform-origin: right;
            transform: scaleX(1);
        }
        nav a .ring {
            position: relative;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        nav a .ring i {
            position: absolute;
            inset: 0;
            border: 2px solid #fff;
            transition: 0.5s;
        }
        nav a .ring i:nth-child(1) {
            border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
            animation: animate 6s linear infinite;
        }
        nav a .ring i:nth-child(2) {
            border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
            animation: animate 4s linear infinite;
        }
        nav a .ring i:nth-child(3) {
            border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
            animation: animate2 10s linear infinite;
        }
        nav a:hover .ring i {
            border: 6px solid var(--clr);
            filter: drop-shadow(0 0 20px var(--clr));
        }
        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes animate2 {
            0% {
                transform: rotate(360deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }
        main {
            flex-grow: 1;
            padding-top: 70px; /* Ensure content is below the navbar */
        }
        .hero {
            text-align: center;
            padding: 40px 20px;
            background: url('background.jpg') no-repeat center center/cover;
            animation: backgroundAnim 20s linear infinite;
        }
        @keyframes backgroundAnim {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 2s forwards 1s;
        }
        .hero p {
            font-size: 1.5em;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeIn 2s forwards 2s;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        .services, .advantages {
            background: #222;
            margin: 20px 0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
        }
        .services:nth-child(1) {
            animation-delay: 0.3s;
        }
        .services:nth-child(2) {
            animation-delay: 0.6s;
        }
        .services:nth-child(3) {
            animation-delay: 0.9s;
        }
        .advantages:nth-child(1) {
            animation-delay: 0.3s;
        }
        .advantages:nth-child(2) {
            animation-delay: 0.6s;
        }
        .advantages:nth-child(3) {
            animation-delay: 0.9s;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .services h2, .advantages h2 {
            margin-bottom: 10px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
        .services ul, .advantages ul {
            list-style: none;
            padding: 0;
        }
        .services li, .advantages li {
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .services p, .advantages p {
            margin-bottom: 10px;
        }
        .advantages h3 {
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .advantages p {
            margin-top: 5px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
        footer {
            padding: 20px;
            background: #111;
            text-align: center;
        }
        .social-media {
            margin: 20px 0;
        }
        .social-media a {
            margin: 0 10px;
            color: #fff;
            text-decoration: none;
            font-size: 1.5em;
            transition: color 0.3s;
        }
        .social-media a:hover {
            color: #007bff;
        }
        .ring {
            position: relative;
            width: 500px;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
        }
        .ring i {
            position: absolute;
            inset: 0;
            border: 2px solid #fff;
            transition: 0.5s;
        }
        .ring i:nth-child(1) {
            border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
            animation: animate 6s linear infinite;
        }
        .ring i:nth-child(2) {
            border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
            animation: animate 4s linear infinite;
        }
        .ring i:nth-child(3) {
            border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
            animation: animate2 10s linear infinite;
        }
        .ring:hover i {
            border: 6px solid var(--clr);
            filter: drop-shadow(0 0 20px var(--clr));
        }
        @keyframes animate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes animate2 {
            0% {
                transform: rotate(360deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }
        .login {
            width: 300px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            margin: auto; /* Center the login form */
        }
        .login h2 {
            font-size: 2em;
            color: #fff;
        }
        .login .inputBx {
            position: relative;
            width: 100%;
        }
        .login .inputBx input {
            width: 100%;
            padding: 12px 20px;
            background: transparent;
            border: 2px solid #fff;
            border-radius: 40px;
            font-size: 1.2em;
            color: #fff;
            box-shadow: none;
            outline: none;
        }
        .login .inputBx input[type="submit"] {
            background: linear-gradient(45deg, #ff357a, #fff172);
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login .inputBx input[type="submit"]:hover {
            background: linear-gradient(45deg, #ff0057, #fffd44);
        }
        .login .inputBx input::placeholder {
            color: rgba(255, 255, 255, 0.75);
        }
    </style>
</head>
<body>
    <nav>
        <a href="#services">
            <div class="ring">
                <i style="--clr:#00ff0a;"></i>
                <i style="--clr:#ff0057;"></i>
                <i style="--clr:#fffd44;"></i>
            </div>
            <label>&nbsp; Services</label>
        </a>
        <a href="#advantages">
            <div class="ring">
                <i style="--clr:#00ff0a;"></i>
                <i style="--clr:#ff0057;"></i>
                <i style="--clr:#fffd44;"></i>
            </div>
            <label>&nbsp;Advantages</label>
        </a>
        <a href="#login">
            <div class="ring">
                <i style="--clr:#00ff0a;"></i>
                <i style="--clr:#ff0057;"></i>
                <i style="--clr:#fffd44;"></i>
            </div>
            <label>&nbsp; Login</label> 
        </a>
    </nav>
    <div class="container">
        <header>
            <img src="SFBlackTheme.png" alt="Sahel Fleet Logo">
        </header>
        <div class="hero">
            <h1>Welcome to Sahel Fleet</h1>
            <p>Your best tool for fleet management and optimization.</p>
        </div>
        <main>
            <section id="services" class="services">
                <h2>Our Services</h2>
                <p>SF offers a range of services tailored to meet your fleet management needs:</p>
                <ul>
                    <li>
                        <h3>Fleet Management</h3>
                        <p>Optimize your fleet operations with real-time tracking and management tools.</p>
                    </li>
                    <li>
                        <h3>Mission Planning and Assignment</h3>
                        <p>Plan and assign missions efficiently to ensure timely and effective task completion.</p>
                    </li>
                    <li>
                        <h3>Driver Management</h3>
                        <p>Manage your drivers with tools that monitor performance and ensure compliance.</p>
                    </li>
                </ul>
            </section>
            <section id="advantages" class="advantages">
                <h2>Why Sahel Fleet?</h2>
                <ul>
                    <li>
                        <h3>Boost your fleet efficiency</h3>
                        <p>Having a clear vision of your operations, you will optimize the activity of your fleet.</p>
                    </li>
                    <li>
                        <h3>Comply with regulation</h3>
                        <p>We use our data to make you comply with maritime regulations.</p>
                    </li>
                    <li>
                        <h3>Enhance Safety</h3>
                        <p>Implement safety protocols and monitor compliance to ensure the well-being of your team and assets.</p>
                    </li>
                </ul>
            </section>
        </main>
        <footer>
            <div class="ring">
                <i style="--clr:#00ff0a;"></i>
                <i style="--clr:#ff0057;"></i>
                <i style="--clr:#fffd44;"></i>
                <div id="login" class="login">
                    <h2>Login</h2>
                    <div class="inputBx">
                        <form action="login.php" method="post">
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="submit" value="Sign in">
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <p>&copy; 2024 Sahel Fleet. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
