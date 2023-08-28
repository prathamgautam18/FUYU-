<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>user dashboard</title>

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
                <input type="search" name="search" placeholder="Search for Restuarents" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Restaurants and Bakeries</h2>

            

            <a href="#">
            <div class="box-3 float-container">
                <img src="/projectdemo/img/imperial.png" alt="imperial" style="width:300px;height:300px;margin-left:200px">

                
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="/projectdemo/img/fresh_best.jpg" alt="Fresh Best Bakery" style="width:300px;height:300px;margin-left:200px">

            </div>
            </a>
            

           
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


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