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

    <div class="profile-container">
      <h1>User Profile</h1><br><br>
      <?php
      session_start();
      include("../dbconnection.php");

      // Assuming the user information is stored in the 'users' table
      $username = $_SESSION['username'];

      $sql = "SELECT * FROM userregistration JOIN roles ON userregistration.role_id=roles.role_id WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);

      if (!$result) {
          echo "Error fetching data: " . mysqli_error($conn);
      } else {
          $row = mysqli_fetch_assoc($result);
          if ($row) {
              echo "<p><strong>Username:</strong> {$row['username']}</p><br>";
              echo "<p><strong>Email:</strong> {$row['email']}</p><br>";
              echo "<p><strong>Full Name:</strong> {$row['fullname']}</p><br>";
              echo "<p><strong>Role Name:</strong> {$row['role_name']}</p><br>";
              // Add more fields as per your database structure
          } else {
              echo "User information not found.";
          }
      }
      ?>
    </div>
  
</body>
</html>
</body>
</html>



<?php


if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}


?>

