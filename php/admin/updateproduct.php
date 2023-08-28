<?php
// updateproduct.php
session_start();
// Check if the product_id is provided through the URL
if (isset($_POST['id'])) {
    $product_id = $_POST['id'];

    // If a form is submitted with updated product details, process the update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect the updated details from the form
        $updated_product_name = $_POST['product_name'];
        $updated_product_price = $_POST['product_price'];
        $updated_product_quantity = $_POST['product_quantity'];
        $updated_product_description = $_POST['product_description'];

        // Include the database connection
        include("../dbconnection.php");

        // Prepare and execute the UPDATE query
        $sql = "UPDATE products SET product_name='$updated_product_name', product_price='$updated_product_price', product_quantity='$updated_product_quantity', product_description='$updated_product_description' WHERE product_id='$product_id'";
        $result = mysqli_query($conn, $sql);

        // Check if the update was successful and redirect back to the original page
        if ($result) {
            header("Location: products.php");
            exit();
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        // If the form is not submitted, show the form to update product details
        include("../dbconnection.php");

        // Fetch the product details using the provided product_id
        $sql = "SELECT * FROM products WHERE product_id='$product_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error fetching product details: " . mysqli_error($conn);
        } else {
            $row = mysqli_fetch_assoc($result);
            ?>
            <!-- Display the update form with pre-filled product details -->
            <form action="updateproduct.php?id=<?php echo $product_id; ?>" method="post">
                Product name: <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>"><br>
                Product Price: <input type="number" name="product_price" value="<?php echo $row['product_price']; ?>"><br>
                Product Quantity: <input type="number" name="product_quantity" value="<?php echo $row['product_quantity']; ?>"><br>
                Product Description: <input type="text" name="product_description" value="<?php echo $row['product_description']; ?>"><br>
                <input type="submit" value="Update">
            </form>
            <?php
        }
    }
} else {
    // If the product_id is not provided, redirect back to the original page
    header("Location: products.php");
    exit();
}
?>
