<?php
session_start();
include ('dbconnection.php');

// Check if the registration form is submitted
if (isset($_POST['register'])) {
    $flashmessage = '';

    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $user_type = $_POST['user_type']; //  user type selection

    if ($password == $password2) {
        $password = md5($password);

        // role_id based on the user type
        if ($user_type === 'vendor') {
            // Vendor role
            $role_id = 2;
        } elseif ($user_type === 'user') {
            // Regular user role
            $role_id = 3;
        } else {
            // Invalid user type
            $_SESSION['flash_message'] = "Invalid user type selected.";
            header("Location: signup.php");
            exit();
        }

        // Continue with the registration process
        $sql = "INSERT INTO userregistration(fullname, username, email, phone, password, role_id)
                VALUES ('$name', '$username', '$email', '$phone', '$password', '$role_id')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['flash_message'] = "Registration successful! Please log in to continue.";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['flash_message'] = "Passwords do not match!";
        header("Location: signup.php");
        exit();
    }
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Validate the user's credentials by querying the database
    $sql = "SELECT * FROM user_role WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // var_dump($row); die();

    // if ($row) {
    //     header("Location: login.php?success_msg='Login Succeeded!'");
    // } else {
    //     header("Location: login.php?error_msg='Failed to login!'");
    // }

    if ($row && $row['password'] == md5($password)) {
        if ($row['role_id'] == '1') {
            // admin login using role_id=1
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header('Location: /projectdemo/php/admin/users.php'); // Redirect to admin dashboard or any other page for admin
            
        } 
        elseif ($row['role_id'] == '2') {
            //  user login using role_id=2  
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header('Location: /projectdemo/php/vendors/home.php');
            exit();
        } elseif ($row['role_id'] == '3') {
            // Vendor login  using roleid=3
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            header('Location: /projectdemo/php/user/home.php'); 
            exit();
        } 
    } else {
        $_SESSION['login_msg'] = "Invalid Username or Password";
        header("Location: login.php");
        exit();
    }
}
?>