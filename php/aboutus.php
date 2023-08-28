<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');


        
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: poppins;
            
        }
        body{
            background-image: url("/projectdemo/img/feedback.jpg");
        }

        #about-section {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 80px 12%;
        }

        .about-left img {
            width: 420px;
            height: auto;
            transform: translateY(50px);
        }

        .about-right {
            width: 54%;
        }

        .about-right h1 {
            color: limegreen;
            font-size: 37px;
            margin-bottom: 5px;
        }

        .about-right p {
            color: #444;
            line-height: 26px;
            font-size: 15px;
        }

        .address ul {
            display: flex;
            flex-direction: column;
           
        }

        .address ul li {
            display: inline-flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .address-logo {
            font-size: 18px;
            margin-right: 8px;
            color: #e74d06;
        }
        body, html {
      height: 100%;
      margin: 0;
      padding: 0;
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
    padding: 20px 30px;
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
    color: inherit;
   
  }


    </style>
</head>

<body>
    <header id="main">
        <nav>
            <ul>
                <li><a href="landingpage.php">HOME</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
                <li><a href="contactus.php">CONTACT</a></li>

                <!-- The separator class is removed since it's not used -->
                 <hr class="separator">
                <li><a href="login.php" id="rightlogin">LOGIN</a></li>
                <li><a href="signup.php" id="rightlogin">SIGNUP</a></li>
            </ul>
        </nav>
    </header>
    <section id="about-section">

        <div class="about-left">
            <img src="/projectdemo/img/fruits.jpg" alt="About Img" />
        </div>

        <div class="about-right">
            <h4>Our Story</h4>
            <h1>About us</h1>
            <p>We help businesses enjoy a better digital experience while
                selling their products that might not generate a good source of revenue in the future.
            </p>
            <br>
            <div class="address">
                <ul>
                    <li>
                        <span class="address-logo">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        <p>Address</p>
                        <span class="saprater">:</span>
                        <p>Kathmandu, Nepal</p>
                    </li>
                    <li>
                        <span class="address-logo">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <p>Phone No</p>
                        <span class="saprater">:</span>
                        <p>+977 9864671142</p>
                    </li>
                    <li>
                        <span class="address-logo">
                            <i class="far fa-envelope"></i>
                        </span>
                        <p>Email ID</p>
                        <span class="saprater">:</span>
                        <p>fuyubusiness@gmail.com</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>
