<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
   
    <link rel="stylesheet" href="/projectdemo/css/admin.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3><span></span></h3>
        </div>

        <div class="side-content">
            <div class="profile">
            <div class="profile-img bg-img" ></div>
                <h4></h4>
                <small>FUYU</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="Users.php" class="active">
                            <span class="las la-home"></span>
                            <small>Users</small>
                        </a>
                    </li>
                    <li>
                       <a href="adminprofile.php">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>


                        </a>
                    </li>
                    <li>
                       <a href="contactusdata.php">
                            <span class="las la-envelope"></span>
                            <small>Message box</small>
                        </a>
                    </li>
                    <li>
                       <a href="products.php">
                            <span class="las la-clipboard-list"></span>
                            <small>Product</small>


                        </a>
                    </li>
                    <li>
                       <a href="Orders.php">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>

                    <li>
                    <a href="settings.php">
                            <span class="fa fa-gear fa-spin"></span>
                            <small>Settings</small>
                          </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">
                    <label for="">
                        <span class="las la-search"></span>
                    </label>

                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>

                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>

                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>

                        
                        <a href="../logout.php"><span>Logout</span></a>
                    </div>
                </div>
            </div>
        </header>


        <main>

            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home </small>
            </div>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <span>Entries</span>
                            <select name="" id="">
                                <option value="">ID</option>
                            </select>
                            <button>Add record</button>
                        </div>

                        <div class="browse">
                           <input type="search" placeholder="Search" class="record-search">
                            <select name="" id="">
                                <option value="">Status</option>
                            </select>
                        </div>
                    </div>

                   

    <div class="profile-container">
      <h1>My Profile</h1><br><br>
      <?php
      include("../dbconnection.php");

      $username = $_SESSION['username'];

      // Check if the form is submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the new username and password from the form
        $newUsername = $_POST['newUsername'];
        $newPassword = md5($_POST['newPassword']);

        // Update the user's data in the database
        $updateSql = "UPDATE userregistration SET username = '$newUsername', password = '$newPassword' WHERE username = '$username'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
          // Update successful, display a success message
          echo "<p class='success-message'>Username and password updated successfully!</p>";
          // Update the session variable with the new username
          $_SESSION['username'] = $newUsername;
        } else {
          echo "<p class='error-message'>Error updating data: " . mysqli_error($conn) . "</p>";
        }
      }

      $sql = "SELECT * FROM userregistration JOIN roles ON userregistration.role_id=roles.role_id WHERE username = '$username'";
      $result = mysqli_query($conn, $sql);

      if (!$result) {
          echo "Error fetching data: " . mysqli_error($conn);
      } else {
          $row = mysqli_fetch_assoc($result);
          if ($row) {
              // Display the form with input fields for changing username and password
              echo '<form method="POST">';
              echo '<table>';
              echo '<tr><td><strong>Username:</strong></td><td><input type="text" name="newUsername" value="' . $row['username'] . '"></td></tr>';
              echo '<tr><td><strong>Email:</strong></td><td>' . $row['email'] . '</td></tr>';
              echo '<tr><td><strong>Full Name:</strong></td><td>' . $row['fullname'] . '</td></tr>';
              echo '<tr><td><strong>Role Name:</strong></td><td>' . $row['role_name'] . '</td></tr>';
              // Add a password input field for changing the password
              echo '<tr><td><strong>New Password:</strong></td><td><input type="password" name="newPassword"></td></tr>';
              echo '</table>';
              echo '<input type="submit" value="Confirm Change" onclick="return confirm(\'Are you sure you want to change your username and password?\');">';
              echo '</form>';
          } 
      }
      ?>

    </div>
  </div>
</body>
</html>