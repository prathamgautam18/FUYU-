<!DOCTYPE html>
<html>
<head>
  
  <title>Website Design</title>

  <script>
    function validateform() {
        var fname = document.getElementById("fnameInput").value;
        var lname = document.getElementById("lnameInput").value;
        var phone = document.getElementById("phoneInput").value;
        var subject = document.getElementById("subjectInput").value;

        // Check if the first and last name contain numbers
        var namePattern = /^[A-Za-z]+$/;
        if (!namePattern.test(fname)) {
            alert("First name should not contain numbers.");
            return false;
        }
        if (!namePattern.test(lname)) {
            alert("Last name should not contain numbers.");
            return false;
        }

        // Check if the phone number contains exactly 10 digits
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
            alert("Phone number should contain exactly 10 digits.");
            return false;
        }

        // Check if the message has more than 20 words
        if (subject.trim().length <= 20) {
            alert("Message should be more than 20 characters.");
            return false;
        }

        // Show the flash message
        var flashMessage = document.getElementById("flashMessage");
        flashMessage.innerHTML = "Form submitted successfully!";
        flashMessage.style.display = "block";

        // Hide the flash message after 5 seconds
        setTimeout(function() {
            flashMessage.style.display = "none";
        }, 5000);

        // Prevent form submission (to keep the message displayed)
        return false;
    }
</script>


  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
     #main{
    display: flex;
    justify-content: space-between;
    background-color: lightblue;
  }
  li {
    padding: 10px 30px;
    display: inline-block;
    font-family: poppins;
    color: black;
    background-color: lightblue;
  }
  li:hover{
    background-color: limegreen;
    border-radius: 8px;
    color: black;
   
  }

  ul {
    display: flex;
    justify-content: space-between;
    align-items: center;
    list-style-type: none;
   
  }
  .separator {
    width: 1px;
    height: 15px;
    background-color: #444444;
    margin-right: 10px;
    margin-left: 700px;
  }
 
  ul li a{
    text-decoration: none;
    color: inherit;/* it takes parent color*/
   
  }

    
    .background {
      background-image: url('/projectdemo/img/fruits.jpg');
      background-size: cover;
      background-position: bottom;
      height: 50%;
      width: 100%;
      position: fixed;
      top: 400px;
      left: 10;
      opacity: 0.8;
    }
    
    .container {
      position: absolute;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -30%);
      background-color: lightblue;
      padding: 0px;
      border-radius: 20px;
      width: 700px;
      height: 500px;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      gap: 20px;
    }
    
    .container img {
      width: 300px;
      height: 450px;
      margin-top: 15px;
      margin-bottom: 10px;
      border-radius: 20px;
      margin-left: 30px;
    }
    
    .container form input[type="text"],
    .container form input[type="password"] {
      margin-top: 15px;
      width: 70%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      cursor: pointer;
    }
    
    .container form input[type="submit"] {
      width: 50%;
      padding: 10px;
      border-radius: 5px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
      align-items: center;
      margin-top: 10px;
      margin-bottom: 10px;
  }
  
  #center {
    display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  flex-direction: row;
  flex-grow: 1;
  }
  
  a {
    text-decoration: none;
    color: black;
  }
  .container-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #3ae2ee, #f3c52e);
            padding: 10px;
        }
        .flash-message {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border-radius: 5px;
   
    
  }

  </style>
</head>
<body>
  
    <!-- <div id="flashMessage" class="flash-message"><?php echo $flashMessage; ?></div> -->

  <header id="main">
           <div id="lists">
                <nav>

                    <ul>
                        <li><a href="landingpage.php">HOME</a></li>
                        <li><a href="aboutus.php">ABOUT US</a></li>
                        <li><a href="feedback.php">FEEDBACK</a></li>
                        <li><a href="contactus.php">CONTACT</a></li>
                        

                        <hr class="separator">
                        <li><a href="login.php" id="rightlogin" >LOGIN</a></li>
                        <li><a href="signup.php" id="rightlogin" >SIGNUP</a></li>

                    </ul>
                </nav>
            </div>
        </header>

  <div class="background"></div>
  <div class="container">
    <div>
      <img src="/projectdemo/img/contactimg.jpg" alt="Logo" >
    </div>

    <div id="center">
    
<form action="/projectdemo/php/contactus.php" method="post" onsubmit="return validateform()">

  <input type="text" name="fname" id="fnameInput" placeholder="FirstName" required><br>

  <input type="text" name="lname" id="lnameInput" placeholder="LastName" required><br>
 
  <input type="text" name="email" id="emailInput" placeholder="Email" required><br>
  
  <input type="text" name="phone" id="phoneInput" placeholder="phone number" required><br><br>
 
   <textarea name="subject" id="subjectInput" placeholder="Message..." style="height:100px;width: 300px;" required></textarea><br>

 <input type="submit" name="contact_submit" id="submit" value="Message" style="width: 100px;" >

      
      </form>
    </div>
  </div>
  
</body>
</html>

<?php

include('dbconnection.php');


// $flashMessage = '';

if (isset($_POST['contact_submit'])) {

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];


    $sql = "INSERT INTO contactus(fname, lname, email, phone, subject)
            VALUES ('$fname', '$lname', '$email', '$phone', '$subject')";

    
    if ($conn->query($sql) === TRUE) {
        echo("data inserted successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }
   
    $conn->close();
}
?>