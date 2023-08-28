<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>user dashboard</title>

    <style>
        
        p{
            margin-bottom:10px;
            font-size:20px;
        }
        p:hover{
          background-color:green;
          width:120px;
          
        }
        h3{
            margin-bottom:20px;
        }
    </style>

    <link rel="icon" type="image/x-icon" href="/images/logo.png">

    <link rel="stylesheet" href="/projectdemo/css/user.css">
</head>
<body>

    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="/projectdemo/img/fuyu.png" alt="fuyu logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="products.php">Foods</a>
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

    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Orders" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Order History</h2>

     
<br>
<br>
<span>
<?php
        include("../dbconnection.php");


        // Handle the form submission and display the selected order
        if (isset($_POST['submit'])) {
            $product_id = $_POST['product_id'];
            $product_price = $_POST['product_price'];
            $product_name = $_POST['product_name'];
            $product_quantity = $_POST['product_quantity'];

            echo '<div class="selected-order">';
            echo '<h3>Your Selected Order</h3>';
            echo '<table>';
            echo '<tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Total Price</th></tr>';
            echo '<tr>';
            echo '<td>' . $product_name . '</td>';
            echo '<td>' . $product_price . '</td>';
            echo '<td>' . $product_quantity . '</td>';
            $totalPrice = $product_price * $product_quantity;
            echo '<td>' . $totalPrice . '</td>';
            echo '</tr>';
            echo '</table><br><br>';
            echo '<soan>Total Amount: Rs. ' . $totalPrice . '</span><br><br>';
            echo '<span>Please confirm your order ' . $_SESSION['username'] . ' after making the payment.</span>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        </span>

    </div>
</section>

    </div>


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/">
                        <img src="/projectdemo/img/fb.png"/></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/">
                        <img src="/projectdemo/img/instagram.png"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/">
                        <img src="/projectdemo/img/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>

</body>
</html>