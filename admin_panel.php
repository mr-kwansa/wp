<?php
// Ensure error reporting is enabled for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the connection file
include 'connection.php';
include 'update_product.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <div class="product-form">
            <h2>Update Product</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <!-- Include a hidden input field to capture the product_id -->
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="name">ID:</label>
                <input type="number" id="name" name="name"><br><br>

                <label for="picture">Picture:</label>
                <input type="file" id="picture" name="picture" accept="image/*" required><br><br>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required><br><br>

                <label for="info">Info:</label><br>
                <textarea id="info" name="info" rows="4" cols="50" required></textarea><br><br>

                <input type="submit" value="Update Product">
            </form>
        </div>
    </div>
</body>
</html>
