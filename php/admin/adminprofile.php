<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

include("../dbconnection.php");

// Assuming the user information is stored in the 'users' table
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM userregistration JOIN roles ON userregistration.role_id=roles.role_id WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error fetching data: " . mysqli_error($conn);
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $username = $row['username'];
            $email = $row['email'];
            $fullname = $row['fullname'];
            $role_name = $row['role_name'];
            // Add more fields as per your database structure
        } else {
            // If no user data found, set default values or leave them empty
            $email = "N/A";
            $fullname = "N/A";
            $role_name = "N/A";
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<script src="/projectdemo/js/profile.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600&display=swap');

:root {
    --main-color: lightblue;
    --color-dark: lightblue;
    --text-grey: #B0B0B0;
}

* {
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style-type: none;
    box-sizing: border-box;
    font-family: 'Merriweather', sans-serif;
}

#menu-toggle {
    display: none;
}

.sidebar {
    position: fixed;
    height: 100%;
    width: 165px;
    left: 0;
    bottom: 0;
    top: 0;
    z-index: 100;
    background: var(--color-dark);
    transition: left 300ms;
}

.side-header {
    box-shadow: 0px 5px 5px -5px rgb(0 0 0 /10%);
    background: var(--main-color);
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.side-header h3, side-head span {
    color: #fff;
    font-weight: 400;
}

.side-content {
    height: calc(100vh - 60px);
    overflow: auto;
}

/* width */
.side-content::-webkit-scrollbar {
  width: 5px;
}

/* Track */
.side-content::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
.side-content::-webkit-scrollbar-thumb {
  background: #b0b0b0;
  border-radius: 10px;
}

/* Handle on hover */
.side-content::-webkit-scrollbar-thumb:hover {
  background: #b30000;
}

.profile {
    text-align: center;
    padding: 2rem 0rem;
}
.profile-container {
  margin: 30px;
  padding: 40px;
  background-color: #f5f5f5;
  border-radius: 10px;
  box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);

  
}

.profile-container h1 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 40px;
}

.profile-container p {
  font-size: 16px;
  margin-bottom: 15px;
}

.bg-img {
  
  background-image: url('/projectdemo/img/fuyu.png');
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    background-size: cover;
}

.profile-img {
    height: 80px;
    width: 80px;
    display: inline-block;
    margin: 0 auto .5rem auto;
    border: 3px solid #899DC1;
}

.profile h4 {
    color: #fff;
    font-weight: 500;
}

.profile small {
    color: #899DC1;
    font-weight: 600;
}

.sidebar {
    overflow-y: auto;
}

.side-menu ul {
    text-align: center;
}

.side-menu a {
    display: block;
    padding: 1.2rem 1rem;
}


.side-menu a.active span, .side-menu a.active small {
    color: #fff;
}

.side-menu a span {
    display: block;
    text-align: center;
    font-size: 1.7rem;
}

.side-menu a span, .side-menu a small {
    color: #899DC1;
}

#menu-toggle:checked ~ .sidebar {
    width: 60px;
}

#menu-toggle:checked ~ .sidebar .side-header span {
    display: none;
}

#menu-toggle:checked ~ .main-content {
    margin-left: 60px;
    width: calc(100% - 60px);
}

#menu-toggle:checked ~ .main-content header {
    left: 60px;
}

#menu-toggle:checked ~ .sidebar .profile,
#menu-toggle:checked ~ .sidebar .side-menu a small {
    display: none;
}

#menu-toggle:checked ~ .sidebar .side-menu a span {
    font-size: 1.3rem;
}


.main-content {
    margin-left: 165px;
    width: calc(100% - 165px);
    transition: margin-left 300ms;
}

header {
    position: fixed;
    right: 0;
    top: 0;
    left: 165px;
    z-index: 100;
    height: 60px;
    box-shadow: 0px 5px 5px -5px rgb(0 0 0 /10%);
    background: #fff;
    transition: left 300ms;
}

.header-content, .header-menu {
    display: flex;
    align-items: center;
}

.header-content {
    justify-content: space-between;
    padding: 0rem 1rem;
}

.header-content label:first-child span {
    font-size: 1.3rem;
}

.header-content label {
    cursor: pointer;
}

.header-menu {
    justify-content: flex-end;
    padding-top: .5rem;
}

.header-menu label,
.header-menu .notify-icon {
    margin-right: 2rem;
    position: relative;
}

.header-menu label span,
.notify-icon span:first-child {
    font-size: 1.3rem;
}

.notify-icon span:last-child {
    position: absolute;
    background: var(--main-color);
    height: 16px;
    width: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    right: -5px;
    top: -5px;
    color: #fff;
    font-size: .8rem;
    font-weight: 500;
}

.user {
    display: flex;
    align-items: center;
}

.user div, .client-img {
    height: 40px;
    width: 40px;
    margin-right: 1rem;
}

.user span:last-child {
    display: inline-block;
    margin-left: .3rem;
    font-size: .8rem;
}

main {
    margin-top: 60px;
}

.page-header {
    padding: 1.3rem 1rem;
    background: #E9edf2;
    border-bottom: 1px solid #dee2e8;
}

.page-header h1, .page-header small {
    color: #74767d;
}

.page-content {
    padding: 1.3rem 1rem;
    background: #f1f4f9;
}

.analytics {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2rem;
    margin-top: .5rem;
    margin-bottom: 2rem;
}

.card {
    box-shadow: 0px 5px 5px -5px rgb(0 0 0 / 10%);
    background: #fff;
    padding: 1rem;
    border-radius: 3px;
}

.card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-head h2 {
    color: #333;
    font-size: 1.8rem;
    font-weight: 500;
}

.card-head span {
    font-size: 3.2rem;
    color: var(--text-grey);
}

.card-progress small {
    color: #777;
    font-size: .8rem;
    font-weight: 600;
}

.card-indicator {
    margin: .7rem 0rem;
    height: 10px;
    border-radius: 4px;
    background: #e9edf2;
    overflow: hidden;
}

.indicator {
    height: 10px;
    border-radius: 4px;
}

.indicator.one {
    background: #22baa0;
}

.indicator.two {
    background: #11a8c3;
}

.indicator.three {
    background: #f6d433;
}

.indicator.four {
    background: #f25656;
}

.records {
    box-shadow: 0px 5px 5px -5px rgb(0 0 0 / 10%);
    background: #fff;
    border-radius: 3px;
}

.record-header {
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.add, .browse {
    display: flex;
    align-items: center;
}

.add span {
    display: inline-block;
    margin-right: .6rem;
    font-size: .9rem;
    color: #666;
}

input, button, select {
    outline: none;
}

.add select, .browse input, .browse select {
    height: 35px;
    border: 1px solid #b0b0b0;
    border-radius: 3px;
    display: inline-block;
    width: 75px;
    padding: 0rem .5rem;
    margin-right: .8rem;
    color: #666;
}

.add button {
    background: var(--main-color);
    color: #fff;
    height: 37px;
    border-radius: 4px;
    padding: 0rem 1rem;
    border: none;
    font-weight: 600;
}

.browse input {
    width: 150px;
}

.browse select {
    width: 100px;
}

.table-responsive {
    width: 100%;
    overflow: auto;
}

table {
    border-collapse: collapse;
    padding: 10px;
}

table thead tr {
    background: #e9edf2;
}

table thead th {
    padding: 1rem 0rem;
    text-align: left;
    color:black;
    font-size: .9rem;
}

table thead th:first-child {
    padding-left: 1rem;
}

table tbody td {
    padding: 1rem 1rem;
    border-left: 1px solid black;
    width: 150px;
    
}

table tbody td:first-child {
    padding-left: 2rem;
    color: var(--main-color);
    font-weight: 600;
    font-size: .9rem;
    
}

table tbody tr {
    border-bottom: 1px solid black;
   
}

.client {
    display: flex;
    align-items: center;
}

.client-img {
    margin-right: .5rem;
    border: 2px solid #b0b0b0;
    height: 45px;
    width: 45px;
}

.client-info h4 {
    color: #555;
    font-size: .95rem;
}

.client-info small {
    color: #777;
}

.actions span {
    display: inline-block;
    font-size: 1.5rem;
    margin-right: .5rem;
}

.paid {
    display: inline-block;
    text-align: center;
    font-weight: 600;
    color: var(--main-color);
    background: #e5f8ed;
    padding: .5rem 1rem;
    border-radius: 20px;
    font-size: .8rem;
}

@media only screen and (max-width: 1200px) {
    .analytics {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media only screen and (max-width: 768px) {
    .analytics {
        grid-template-columns: 100%;
    }

    .sidebar {
        left: -165px;
        z-index: 90;
    }

    header {
        left: 0;
        width: 100%;
    }

    .main-content {
        margin-left: 0;
        width: 100%;
    }

    #menu-toggle:checked ~ .sidebar {
        left: 0;
    }

    #menu-toggle:checked ~ .sidebar {
        width: 165px;
    }

    #menu-toggle:checked ~ .sidebar .side-header span {
        display: inline-block;
    }

    #menu-toggle:checked ~ .sidebar .profile,
    #menu-toggle:checked ~ .sidebar .side-menu a small {
        display: block;
    }

    #menu-toggle:checked ~ .sidebar .side-menu a span {
        font-size: 1.7rem;
    }

    #menu-toggle:checked ~ .main-content header {
        left: 0px;
    }

    table {
        width: 900px;
    }
    a{
      text-decoration: none;
    }
    
    
    
}

      </style>
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
                <h4>FUYU</h4>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="Users.php" class="active">
                            <span class="las la-home"></span>
                            Users
                        </a>
                    </li>
                    <li>
                       <a href="adminprofile.php">
                            <span class="las la-user-alt"></span>
                            Profile
                        </a>
                    </li>
                    <li>
                       <a href="contactusdata.php">
                            <span class="las la-envelope"></span>
                            Message box
                        </a>
                    </li>
                    <li>
                       <a href="products.php">
                            <span class="las la-clipboard-list"></span>
                            Product
                        </a>
                    </li>
                    <li>
                       <a href="Orders.php">
                            <span class="las la-shopping-cart"></span>
                            Orders
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
                        <a href="../logout.php"><span>logout</span></a>
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

                <div class="profile-container">
        <h1>Admin Profile</h1>
        <p><strong>Username:</strong> <?php echo $username; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
        <p><strong>Role Name:</strong> <?php echo $role_name; ?></p>
        <!-- Add more fields here as needed -->
    </div>
            </div>
        </div>
    </div>
</body>
</html>
