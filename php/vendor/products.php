<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Dashboard - Products</title>
  <link rel="stylesheet" href="/projectdemo/css/vendor.css">
  <link rel="stylesheet" href="/projectdemo/css/styles.css">
</head>
<body>
  <div class="container">
    <!-- Add a form to input product information -->

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
    <form action="products.php" method="post">
      <label for="product_name">Product Name:</label>
      <input type="text" id="product_name" name="product_name" required>
      <br><br>
      <label for="product_price">Product Price:</label>
      <input type="text" id="product_price" name="product_price" required>
      <br>

      <label for="product_quanitiy">Quantity:</label>
      <input type="text" id="product_quantity" name="product_quantity" required>
      <br>
      
      <label for="product_description">Product Description:</label>
      <textarea id="product_description" name="product_description" required></textarea>
      <br><br>
      <input type="submit" name="addproduct" value="Add Product">
    </form>
    </div>
    <?php
    session_start();
include('../dbconnection.php');


if (isset($_POST['addproduct'])) {
    $productname = $_POST['product_name'];
    $productprice = $_POST['product_price'];
    $productquantity = $_POST['product_quantity'];
    $productdescription = $_POST['product_description'];

    $sql = "INSERT INTO products(product_name, product_price, product_quantity, product_description)
            VALUES ('$productname', '$productprice', '$productquantity', '$productdescription')";

    if (mysqli_query($conn, $sql)) {
        echo "Product successfully inserted";
    } else {
        echo "Product insertion failed: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<?php


if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}


?>


  </div>
</body>
</html>