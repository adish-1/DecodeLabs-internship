<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:/studymate/login/");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StudyMate - About</title>
</head>

<body>

<header>
    <div class="header-top">

        <div class="header-title">
            <i class="fa-solid fa-book-open"></i>
            <span>StudyMate</span>
        </div>

        <div class="user">
            <i class="fas fa-circle-user"></i>
            <span><?php echo htmlspecialchars($username); ?></span>
        </div>

    </div>
</header>

<hr>

<main>

    <div class="navigation">

        <nav>

            <div class="redirection">
                <i class="fas fa-home"></i>
                <a href="../home/">Home</a>
            </div>

            <div class="redirection">
                <i class="fas fa-bell"></i>
                <a href="../reminder/">Reminders</a>
            </div>

            <div class="redirection">
                <i class="fas fa-sticky-note"></i>
                <a href="../note/">Notes</a>
            </div>

            <div class="redirection now">
                <i class="fas fa-info-circle"></i>
                <a href="../about/">About</a>
            </div>

        </nav>

        <div class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <a href="/studymate/api/auth/logout.php">Logout</a>
        </div>

    </div>


    <div class="about-content-area">

        <div class="content-header">
            <h2>About StudyMate</h2>
            <p>A simple productivity application built for students.</p>
        </div>


        <div class="about-card">

            <h3>
                <i class="fas fa-book-open"></i>
                Welcome to StudyMate
            </h3>

            <p>
                StudyMate is a student productivity application designed to
                help manage academic reminders and personal study notes in
                one place. The project focuses on providing a simple,
                responsive and user-friendly interface for organizing
                everyday academic activities.
            </p>


            <div class="project-section">

                <h4>Core Features</h4>

                <ul>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            <strong>User Authentication:</strong>
                            Secure registration and login using sessions
                            and password hashing.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            <strong>Reminders:</strong>
                            Create, view and delete study reminders.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            <strong>Notes:</strong>
                            Create, view and manage personal study notes.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            <strong>API Integration:</strong>
                            Frontend and backend communicate through
                            REST-style PHP APIs and JSON.
                        </span>
                    </li>

                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>
                            <strong>Responsive Design:</strong>
                            Designed to work across desktop, tablet and
                            mobile screen sizes.
                        </span>
                    </li>

                </ul>

            </div>


            <div class="project-section">

                <h4>Technology Stack</h4>

                <div class="tech-stack">

                    <span><i class="fab fa-html5"></i> HTML5</span>
                    <span><i class="fab fa-css3-alt"></i> CSS3</span>
                    <span><i class="fab fa-js"></i> JavaScript</span>
                    <span><i class="fab fa-php"></i> PHP</span>
                    <span><i class="fas fa-database"></i> MySQL</span>
                    <span><i class="fas fa-code"></i> REST API</span>

                </div>

            </div>


            <div class="project-section developer-section">

                <h4>Developer</h4>

                <p>
                    StudyMate was designed and developed by
                    <strong>Adish Jagan AV</strong> as a full-stack
                    development project focused on learning and applying
                    frontend, backend, database and API concepts together.
                </p>

            </div>


            <div class="project-footer-note">

                <i class="fas fa-lightbulb"></i>

                <span>
                    Built with a focus on practical learning,
                    problem solving and real-world web development.
                </span>

            </div>

        </div>

    </div>

</main>


<footer>
    <p>&copy; 2026 StudyMate. All rights reserved.</p>
</footer>

</body>
</html>