<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    
    <link rel="stylesheet" href="/projectdemo/css/user.css">
</head>

<body>

    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="/projectdemo/img/fuyu.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="products.php">Foods</a>
                    </li>
                    <li>
                        <a href="Restuarents">Restuarents</a>
                    </li>
                    <li>
                        <a href="Orders.php">Orders</a>
                    </li>
                </ul>
            
                <li class="profile">
              <img src="/projectdemo/img/icon.png" class="img-container">
              <div class="heading">
              <?php
              session_start();
             $username = $_SESSION['username'];
             echo "$username";
              ?>
              </div>
             
                <div class="dropdown-content">
                  <a href="/projectdemo/php/user/userrprofile.php">My Profile</a>
                  <a href="/projectdemo/php/user/settings.php">Settings</a>
                  <a href="/projectdemo/php/logout.php">Logout</a>
                  </div>
              </li>
          </ul>
                
              </div>
              </div>
              <script src="/projectdemo/js/profile.js"></script>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- fOOD sEARCH Section Starts Here -->

    



   




    <div class="profile-container">
      <h1>User Profile</h1><br><br><br>
      <?php
     
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
  
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/"><img src="/projectdemo/img/fb.png"/></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/"><img src="/projectdemo/img/instagram.png"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/"><img src="/projectdemo/img/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
</body>
</html>




<?php


if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}


?>

