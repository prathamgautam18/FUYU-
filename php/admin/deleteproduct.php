<?php
// deleteproduct.php

// Check if the product_id is provided through the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Include the database connection
    include("../dbconnection.php");

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the deletion was successful and redirect back to the original page
    if ($result) {
        header("Location: products.php");
        exit();
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
    }
} else {
    // If the product_id is not provided, redirect back to the original page
    header("Location: products.php");
    exit();
}
?>