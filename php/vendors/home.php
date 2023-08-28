<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php"); 

}
?>
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
                    <img src="/projectdemo/img/fuyu.png" alt="Restaurant Logo" class="img-responsive1">
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

    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
   
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

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
                    echo '<img src="/projectdemo/img/fruits.jpg" alt="' . $row['product_name'] . '" class="img-responsive img-curve">';
                    echo '</div>';
                    echo '<div class="food-menu-desc">';
                    echo '<h4>' . $row['product_name'] . '</h4>';
                    echo '<p class="food-price">Rs. ' . $row['product_price'] . '</p>';
                    echo '<p class="food-detail">' . $row['product_description'] . '</p>';
                    echo '<br>';
                    echo '<a href="Orders.php" class="btn primary">Order Now</a>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>

    <section class="social">
        <!-- Social section code here -->
        <!-- ... -->
    </section>

    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
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









