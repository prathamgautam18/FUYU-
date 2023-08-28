<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="/projectdemo/css/signup.css">
    <script >
        function validateform() {
  // Get the input values
  var fullName = document.querySelector('input[name="fullname"]').value;
  var username = document.querySelector('input[name="username"]').value;
  var email = document.querySelector('input[name="email"]').value;
  var phone = document.querySelector('input[name="phone"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var confirmPassword = document.querySelector('input[name="confirmpassword"]').value;

  // Regular expression patterns for validation
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var phoneNumberPattern = /^\d{10}$/;

  // Check full name length
  if (fullName.length < 5 || fullName.length > 30) {
    alert(" Full name should be between 5 and 30 characters long.");
    return false;
  }

  // Check username length
  if (username.length < 6 || username.length > 20) {
    alert("Username should be between 6 and 20 characters long.");
    return false;
  }

  // Check email format
  if (!emailPattern.test(email)) {
    alert("Invalid email address!");
    return false;
  }

  // Check phone number length
  if (phone.length !== 10) {
    alert("Phone number should be 10 digits long.");
    return false;
  }
  if (password.length < 6) {
    alert(" pssword number should be minimum 6 characters long.");
    return false;
  }

  // Check password match
  if (password !== confirmPassword) {
    alert("Passwords do not match!");
    return false;
  }

  // Form is valid
  return true;
}
        
    </script>
</head> 
<body>

    <div class="container-wrapper">
        <div class="container">
        <a href="../php/landingpage.php"><img src ="../img/fuyu.png" alt="fuyulogo" class="logo"></a>
            <form method="POST" action="action.php" onsubmit="return validateform()">
                <div class="user-details">
                    
                    <div class="input-box">
                        
                        <input type="text" name="fullname" placeholder="Name" required>
                    </div>
                    <div class="input-box">
                        
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-box">
                        
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-box">
                       
                        <input type="text" name="phone" placeholder="Number" required>
                    </div>
                    <div>
                        
                        <input type="radio" name="user_type" value="vendor">
                        <label for="vendor">Vendor</label>
                        <input type="radio" name="user_type" value="user">
                        <label for="user">user</label>
                    </div>
                    <br><br>
                    <div class="input-box">
                     
                        <input type="password" name="password" placeholder="Password" id="password" required >
                        
                       
                     </div>
                    <div class="input-box">
                       
                        <input type="password" name="confirmpassword" placeholder="Retype password" required>
                    </div>
                    
                </div>
                <div class="button">
                    <input type="submit" value="Sign Up" name="register"  >
                </div>
                <div class="signup-link">
                    Already a user? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
