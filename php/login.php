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
<?php
session_start();
if (isset($_SESSION['flash_message'])) {
    echo '<div class="flash-message">' . $_SESSION['flash_message'] . '</div>';
    unset($_SESSION['flash_message']); // Clear the message so it won't show again on refresh
}
?>

    <div class="container-wrapper">
        <div class="container">
        
            <form action="action.php" method="POST" onsubmit="return validateform();">
                <div class="user-details">
                <a href="../php/landingpage.php"> <img src ="../img/fuyu.png" alt="fuyulogo" class="logo"></a>
                    <div class="input-box">
                    
                        <input type="text" name="name" placeholder="Username" required>
                    </div>
                    <div class="input-box">
                        
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="forgot-password-link">
                   <a href="resetpassword.php">Forgot Your Password?</a>
                     </div>
                    
                </div>
            
                <?php
        
                
            if (isset($_SESSION['login_msg'])){
        
            echo $_SESSION['login_msg'];
            unset($_SESSION['login_msg']);
            }
            ?>
            
           
                <div class="button">
                    <input type="submit" name="login" value="Login" >
                </div>
               
                <div class="signup-link">
                    New user? <a href="signup.php">Sign up</a>
                </div>

            </form>
        </div>
    </div>
        
    
</body>
</html>
