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

    <!-- fOOD sEARCH Section Starts Here -->

   
  
  

    <div class="tablecontainer">
    
      <?php
            include("../dbconnection.php");

            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "Error fetching data: " . mysqli_error($conn);
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="food-menu-box">';
                    echo '<div class="food-menu-img">';
                    echo '<img src="/projectdemo/img/fruits.jpg" alt="images' . $row['product_name'] . '" class="img-responsive img-curve">';
                    echo '</div>';
                    echo '<div class="food-menu-desc">';
                    echo '<h4>' . $row['product_name'] . '</h4>';
                    echo '<p class="food-price">Rs. ' . $row['product_price'] . '</p>';
                    echo '<p class="food-detail">' . $row['product_description'] . '</p>';
                    echo '<br>';
                    // Add a form to submit the order
                    echo '<form action="orders.php" method="POST">';
                    echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                    echo '<input type="hidden" name="product_price" value="' . $row['product_price'] . '">';
                    echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                    echo '<input type="hidden" name="product_quantity" value="' . $row['product_quantity'] . '">';
                    echo '<input type="submit" name="submit" value="Order Now" class="btn primary">';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
      
  </div>
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


</body>
</html>




<?php


if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}


?>
