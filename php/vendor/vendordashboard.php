<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Dashboard</title>
  <link rel="stylesheet" href="/projectdemo/css/vendor.css" >
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="vendordashboard.php" class="logo">
          <img src="/projectdemo/img/fuyu.png" alt="fuyulogo">
          
        </a></li>
        <li><a href="#">
          <i class="home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="vendorprofile.php">
          <i class="user"></i>
          <span class="nav-item">Profile</span>
        </a></li>
        
        <li><a href="products.php">
          <i class="chart-bar"></i>
          <span class="nav-item">products</span>
        </a></li>
       
        <li><a href="settings.php">
          <i class="cog"></i>
          <span class="nav-item">Settings</span>
        </a></li>
        <li><a href="feedback.php">
          <i class="question-circle"></i>
          <span class="nav-item">feedback</span>
        </a></li>
        <li><a href="../logout.php" class="logout">
          <i class="sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>

  </div>
</body>
</html>
<?php
session_start();

if(!isset($_SESSION['username'])){

    header("Location: ../login.php");

}


?>









