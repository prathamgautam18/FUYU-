<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Dashboard</title>
  <link rel="stylesheet" href="/projectdemo/css/vendor.css">
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
          <span class="nav-item">Products</span>
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
      <h1>My Profile</h1><br><br>
      <?php
      session_start();
      include("../dbconnection.php");

      $username = $_SESSION['username'];

      // Check if the form is submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the new username and password from the form
        $newUsername = $_POST['newUsername'];
        $newPassword = md5($_POST['newPassword']);

        // Update the user's data in the database
        $updateSql = "UPDATE userregistration SET username = '$newUsername', password = '$newPassword' WHERE username = '$username'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
          // Update successful, display a success message
          echo "<p class='success-message'>Username and password updated successfully!</p>";
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
              echo '<tr><td><strong>Username:</strong></td><td><input type="text" name="newUsername" value="' . $row['username'] . '"></td></tr>';
              echo '<tr><td><strong>Email:</strong></td><td>' . $row['email'] . '</td></tr>';
              echo '<tr><td><strong>Full Name:</strong></td><td>' . $row['fullname'] . '</td></tr>';
              echo '<tr><td><strong>Role Name:</strong></td><td>' . $row['role_name'] . '</td></tr>';
              // Add a password input field for changing the password
              echo '<tr><td><strong>New Password:</strong></td><td><input type="password" name="newPassword"></td></tr>';
              echo '</table>';
              echo '<input type="submit" value="Confirm Change" onclick="return confirm(\'Are you sure you want to change your username and password?\');">';
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
  </div>
</body>
</html>