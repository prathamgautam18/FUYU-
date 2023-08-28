<?php
session_start();

if (!isset($_SESSION['username'])) {
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
                <div class="profile-img bg-img" style="background-image: url('/projectdemo/img/fuyu.png')"></div>
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
                        <div class="bg-img" style="background-image: url('img/1.jpeg')"></div>
                        <a href="../logout.php"><span>Logout</span></a>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home</small>
            </div>
        </main>

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

            <div>
                <table width="100%">
                    <h1>admin Profile</h1><br><br>
                    <div class="tablecontainer">
                        <table>
                            <caption>Contact Us Data</caption>
                            <thead>
                                <tr>
                                    <th>Contact_id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch data from the 'contactus' table and display it in the table
                                include("../dbconnection.php");

                                $sql = "SELECT * FROM contactus";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    echo "Error fetching data: " . mysqli_error($conn);
                                } else {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row['contact_id']}</td>";
                                        echo "<td>{$row['fname']}</td>";
                                        echo "<td>{$row['lname']}</td>";
                                        echo "<td>{$row['email']}</td>";
                                        echo "<td>{$row['phone']}</td>";
                                        echo "<td>{$row['subject']}</td>";
                                        echo "<td><a href='deletecontactusdata.php?id={$row['contact_id']}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
