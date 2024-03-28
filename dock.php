<?php 
require_once('connection.php');

// Query to retrieve all images ordered by product ID
$query = "SELECT product_id, product_photo FROM products ORDER BY product_id";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if any images were found
if (mysqli_num_rows($result) > 0) {
    // Initialize variables to store images for specific product IDs
    $product_id_1_image = "";
    $product_id_50_image = "";

    // Fetch all rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_photo = $row['product_photo'];

        // Check if product ID is 1
        if ($product_id == 2) {
            // Store image URL for product ID 1
            $product_id_1_image = $product_photo;
        } elseif ($product_id == 50) {
            // Store image URL for product ID 50
            $product_id_50_image = $product_photo;
        }
    }

    // Display image with product ID 1 at the top of the page
    if (!empty($product_id_1_image)) {
        echo "<h2>Product ID: 1</h2>";
        echo '<img src="' . $product_id_1_image . '" alt="Product Image for Product ID: ">';
    } else {
        echo "No image found for Product ID: 1.";
    }

    // Display image with product ID 50 in a different location on the page
    if (!empty($product_id_50_image)) {
        echo "<h2>Product ID: 50</h2>";
        echo '<img src="' . $product_id_50_image . '" alt="Product Image for Product ID: 50">';
    } else {
        echo "No image found for Product ID: 50.";
    }

} else {
    // No images found in the database
    echo "No images found in the database.";
}
?>
