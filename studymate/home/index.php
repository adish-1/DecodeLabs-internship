<?php
session_start();
 if(!isset($_SESSION['username'])){
   header("location:/studymate/login/");
   exit();
 }
 $username=$_SESSION['username'];
 $name=$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyMate</title>
</head>
<body>
   <header>
    <div class="header-top">
      <div class="header-title">
   <i class="fa-solid fa-book-open"></i><span>StudyMate</span>
    </div>
    <div class="user">
        <i class="fas fa-circle-user"></i><span><?php echo htmlspecialchars($username)?></span>
      </div><!--user-->
    </div><!--header-class-->
</header>
 <hr>
<main>
    <div class="navigation">
         <nav>
            <div class="redirection now">
               <i class="fas fa-home"></i>
                 <a href="/studymate/home/">Home</a>
            </div>
            <div class="redirection">
                <i class="fas fa-bell"></i>
                 <a href="../reminder/">Reminders</a>
            </div>
            <div class="redirection">
                <i class="fas fa-sticky-note"></i>
                 <a href="/studymate/note/">Notes</a>
            </div>
            <div class="redirection">
               <i class="fas fa-cog"></i>
                 <a href="/studymate/about/">About</a>
            </div>
         </nav>
         <div class="logout">
                <i class="fas fa-sign-out-alt"></i>
                 <a href="/studymate/api/auth/logout.php ">Logout</a>
            </div>
      </div>
      <div  class="content">
   <section class="welcome-section">
      <h2>Welcome Back , <?php echo htmlspecialchars($username);?> <span><i style="font-style: normal;">&#128075;</i></span></h2>
      <p>Keep Going ,You Are Doing Great!</p>
   </section>
   <section class="quick-actions">
          <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
      <div class="items">
    <button  class="add-reminder">
       + Add Reminder
    </button>
      <button class="add-note">
         + Add Note
      </button>
      </div>
   </section>
   <section class="reminder-notes-session">
      <div class="reminder-section">
        
         <h3> <i class="fas fa-bell"></i> Reminders</h3>
           <ul></ul>
      </div>
      <div class="notes-section">
         <h3><i class="fas fa-sticky-note"></i> Notes</h3>
         <ul></ul>
   </section>
   </div>
</main>
<footer>
   <p>&copy; 2026 StudyMate. All rights reserved.</p>
   </footer>
   <script src="script.js"></script>
</body>
</html>