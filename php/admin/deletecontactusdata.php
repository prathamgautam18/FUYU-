<?php
// deletecontact.php

// Check if the contact_id is provided through the URL
if (isset($_GET['id'])) {
    $contact_id = $_GET['id'];

    // Include the database connection
    include("../dbconnection.php");

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM contactus WHERE contact_id = '$contact_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the deletion was successful and redirect back to the original page
    if ($result) {
        header("Location: contactusdata.php");
        exit();
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
    }
} else {
    // If the contact_id is not provided, redirect back to the original page
    header("Location: contactusdata.php");
    exit();
}
?>
