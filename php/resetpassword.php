<?php
session_start();
include("dbconnection.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the new username and password from the form
  $username = $_POST['name'];
  $newPassword = $_POST['newPassword'];
  $confirmNewPassword = $_POST['confirmnewPassword'];

  if ($newPassword === $confirmNewPassword) {
    // Hash the new password for security
    $hashedNewPassword = md5($newPassword);

    // Update the user's data in the database
    $updateSql = "UPDATE userregistration SET password = '$hashedNewPassword' WHERE username = '$username'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
      // Update successful, display a success message
      $_SESSION['flash_message'] = "Password updated successfully!";
     
    } else {
      $_SESSION['flash_message'] = "Error updating password: " . mysqli_error($conn);
    }
  } else {
    $_SESSION['flash_message'] = "New password and confirm password do not match.";
  }
}
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>

<link rel="stylesheet" href="/projectdemo/css/login.css">
  <script>
    function validateform() {
            var name = document.getElementById("name").value;
            var password = document.getElementById("password").value;
            var namePattern = /^[A-Za-z]+$/;

            if (name.length < 6 || name.length > 16) {
                alert("Name must be between 6 and 16 characters.");
                return false;
            }

            if (!namePattern.test(name)) {
                alert("Name should not contain numbers.");
                return false;
            }

            if (password.length < 6 || password.length > 16) {
                alert("Password must be between 6 and 16 characters.");
                return false;
            }

            return true;
        }
        
    </script>
   

</head>
<body>
    <div>
<?php

if (isset($_SESSION['flash_message'])) {
    echo '<div class="flash-message">' . $_SESSION['flash_message'] . '</div>';
    unset($_SESSION['flash_message']); // Clear the message so it won't show again on refresh
}
?>
</div>
    <div class="container-wrapper">
        <div class="container">
        
            <form action="resetpassword.php" method="POST" onsubmit="return validateform()" >
                <div class="user-details">
                <a href="../php/landingpage.php"> <img src ="../img/fuyu.png" alt="fuyulogo" class="logo"></a>
                    <div class="input-box">
                    
                        <input type="text" name="name" placeholder="Username" required>
                    </div>
                    
                    <div class="input-box">
                        
                        <input type="password" name="newPassword" placeholder="New Password" required>
                    </div>

                    <div class="input-box">
                        
                        <input type="password" name="confirmnewPassword" placeholder="Confirm New Password" required>
                    </div>
                    
                </div>
            
            
           
                <div class="button">
                    <input type="submit" name="login" value="change"  >
                </div>
               
                <div class="signup-link">
                    New user? <a href="signup.php">Sign up</a>
                </div>

            </form>
        </div>
    </div>
        
    
</body>
</html>
