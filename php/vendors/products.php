<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>user dashboard</title>

    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <style>
        

.btn2{
    display: block;
    width: 50%;a
    cursor: pointer;
    border-radius: 10px;
    margin-top: 14px;
    font-size: 20px;
    padding: 16px 50px;
    background: skyblue;
    color: white;
}

.btn2:hover{
    background: black;
}

.container2{
    max-width: 1200px;
    padding: 30px;
    margin: 0 auto;

}

.admin-product-form-container {
  max-width: 800px;
  margin: 0 auto;
  padding: 30px;
  border-radius: 10px;
  background: lightblue;
  display:flex;
}

.admin-product-form-container h3 {
  text-transform: uppercase;
  color: black;
  margin-bottom: 20px;
  text-align: center;
  font-size: 30px;
}

.admin-product-form-container form .box {
  width: 100%;
  border-radius: 10px;
  padding: 12px 16px;
  margin: 16px 0;
  background: white;
  text-transform: none;
  border: 1px solid #ccc;
}

.admin-product-form-container form .btn2 {
  width: 100%;
  cursor: pointer;
  border-radius: 10px;
  margin-top: 14px;
  font-size: 20px;
  padding: 16px 50px;
  background: skyblue;
  color: white;
  border: none;
  transition: background-color 0.3s ease;
}

.admin-product-form-container form .btn2:hover {
  background: black;
}

.admin-product-form-container .add img {
  max-width: 80%;
  border-radius: 10px;
  height:90%;
  margin-top: 30px;
  margin-left: 100px;
}


@media(max-width:991px){
    html{
        font-size:55%;
    }
}

@media(max-width:450px){
    html{
        font-size:50%;
    }
}
    </style>

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
                <input type="submit" name="addproduct" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- CAtegories Section Starts Here -->
    <div class="container2">
            <div class="admin-product-form-container">
                <form action="/projectdemo/php/vendors/products.php" method="post">
                <?php
               include('../dbconnection.php');


    if (isset($_POST['addproduct'])) {
    $productname = $_POST['product_name'];
    $productprice = $_POST['product_price'];
    $productquantity = $_POST['product_quantity'];
    $productdescription = $_POST['product_description'];

    $sql = "INSERT INTO products(product_name, product_price, product_quantity, product_description)
            VALUES ('$productname', '$productprice', '$productquantity', '$productdescription')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['flash_message'] = "Product successfully inserted.";
} else {
    $_SESSION['flash_message'] = "Product insertion failed: " . mysqli_error($conn);
}

    mysqli_close($conn);
}
?>
        

                <h3>add new item</h3>
                <form action="Orders.php" method="post">
                <input type="text" placeholder="enter product name" name="product_name" class="box">
                <input type="text" placeholder="enter product price" name="product_price" class="box">
                <input type="text" placeholder="enter product quantity" name="product_quantity" class="box">
                <input type="text" placeholder="enter product description" name="product_description" class="box">
                <input type="submit" class="btn2" name="addproduct" value="add product">
                
                </form>
                <div class="add">
                    <img src="/projectdemo/img/addproducts.jpg" alt="add product">
               </div>
            </div>
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