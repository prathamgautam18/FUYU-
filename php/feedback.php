<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body, html {
      height: 100%;
      margin: 0;
      background-image: url("/projectdemo/img/feedback.jpg");
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
   
  }
  li:hover{
    background-color: limegreen;
    border-radius: 8px;
    color: black;
   
  }

  ul {
    padding: 20px 30px;
    display: flex ;
    justify-content: space-between;
    align-items: center;
    list-style-type: none;
   
  }
  .separator {
    width: 1px;
    height: 15px;
    background-color : #444444;
    margin-right: 10px;
    margin-left: 700px;
  }
 
  ul li a{
    text-decoration: none;
    color: inherit;/* it takes parent color*/
   
  }
    h1,
    h3 {
      margin: 0;
      word-spacing: 2px;
      color: #333;
    }

    body {
      word-spacing: 6px;
      margin-top: 0;
      padding: 0px;
    }

    button {
      height: 30px;
      width: 100px;
      float: right;
      font-size: 16px;
      margin-top: 25px;
      margin-right: 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    p {
      width: 100%;
      height: 100px;
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 2;
      text-align: justify;
      margin-top: 20px;
      margin-right: 50px;
    }

    a {
      text-decoration: none;
      color: white;
    }

    div {
      margin: 0;
      display: flex;
     
    }

    #rightimage {
      margin-top: 40px;
      height: 500px;
      width: 600px;
      object-fit: cover;
      margin-right:100px;
    }

    #heading {
      background-image: url("/projectdemo/img/header.png");
      margin-top: 0px;
      padding: 5px;
      text-align: center;
      color: white;
    }

    form {
      
      width: 100%;
      max-width: 500px;
      margin: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 40px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      margin-top: 55px;
    }

    legend {
      font-size: 20px;
      padding: 10px; ;
      margin-bottom: 10px;
      font-family: sans-serif, Arial;
      color: black;
      text-align: left;
    }

    fieldset {
      border: none;
      margin-bottom: 20px;
      float: center;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    #submit {
      height: 40px;
      width: 100%;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 18px;
    }

    #submit:hover {
      background-color: #45a049;
    }

    #content {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      float: left;
      width: 100%;
      

    }
  </style>

</head>

<body>
  <header id="main">
    <div id="lists">
      <nav>
        <ul>
          <li><a href="landingpage.php">HOME</a></li>
          <li><a href="aboutus.php">ABOUT</a></li>
          <li><a href="feedback.php">FEEDBACK</a></li>
          <li><a href="contactus.php">CONTACT</a></li>
          <li><hr class="separator"></li>
          <li><a href="/projectdemo/php/login.php" id="rightlogin">LOGIN</a></li>
          <li><a href="signup.php" id="rightlogin">SIGNUP</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div id="heading"> 
    <h2>We Value Your Feedback: Help Us Improve and Serve You Better!</h2>
  </div>

  <div id="content">
    <form>
      <fieldset>
        <legend>Sharing is Caring</legend>
        <input type="text" name="firstname" id="remove" placeholder="Name.." required>
        <input type="text" name="lastname" id="remove" placeholder="Email.." required>
        <select name="customer" required>
          <option value="">-- Select Customer Type --</option>
          <option value="New customer">New Customer</option>
          <option value="Registered customer">Registered Customer</option>
          <option value="Vendor">Vendor</option>
          <option value="Registered Vendor">Registered Vendor</option>
        </select>
        <select name="country" placeholder="Location" required>
          <option value="">-- Select City --</option>
          <option value="Kathmandu">Kathmandu</option>
          <option value="Pokhara">Pokhara</option>
          <option value="Hetauda">Hetauda</option>
        </select>
        <textarea name="subject" placeholder="Feedback..." rows="6" required></textarea>
        
        <input type="submit" id="submit" value="Submit">
      </fieldset>
    </form>

    <div>
      <img src="/projectdemo/img/feedback.png" alt="feedback" id="rightimage">
    </div>
  </div>

</body>
</html>
