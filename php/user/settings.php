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
                        <a href="products.php">Products</a>
                    </li>
                    <li>
                        <a href="restuarents.php">Restuarents</a>
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

   
  
    <div class="profile-container">
      <h1>My Profile</h1><br><br>
      <?php
     
      include("../dbconnection.php");

      $username = $_SESSION['username'];

      // Check if the form is submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the new  password from the form
        $newPassword = md5($_POST['newPassword']);

        // Update the user's data in the database
        $updateSql = "UPDATE userregistration SET password = '$newPassword' WHERE username = '$username'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
          // Update successful, display a success message
          echo "<p class='success-message'>Username updated successfully!</p>";
          // Update the session variable with the new username
          $_SESSION['username'] = $newUsername;
        } else {
          echo "<p class='error-message'>Error updating data: " . mysqli_error($conn) . "</p>";
        }
      }

      $sql = "SELECT * FROM userregistration JOIN roles ON userregistration.role_id=roles.role_id WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);

      if (!$result) {
          echo "Error fetching data: " . mysqli_error($conn);
      } else {
          $row = mysqli_fetch_assoc($result);
          if ($row) {
              // Display the form with input fields for changing username and password
              echo '<form method="POST">';
              echo '<table>';
              echo '<tr><td><strong>Username:</strong></td><td>' . $row['username'] . '</td></tr>';
              echo '<tr><td><strong>Email:</strong></td><td>' . $row['email'] . '</td></tr>';
              echo '<tr><td><strong>Full Name:</strong></td><td>' . $row['fullname'] . '</td></tr>';
              echo '<tr><td><strong>Role Name:</strong></td><td>' . $row['role_name'] . '</td></tr>';
              // Add a password input field for changing the password
              echo '<tr><td><strong>New Password:</strong></td><td><input type="password" name="newPassword"></td></tr>';
              echo '</table>';
              echo '<input type="submit" class="submit" value="Confirm Change" onclick="return confirm(\'Are you sure you want to change your username and password?\');">';
              echo '</form>';
          } 
      }
      ?>
      <?php


if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}


?>
</div>
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

    
  </div>
</body>
</html>