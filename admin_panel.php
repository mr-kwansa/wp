<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connection.php");

if(isset($_POST["createProduct"])){
    // Validate inputs
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_info = $_POST['product_info'];
    $item_price = $_POST['item_price'];
    $product_photo = $_FILES['product_photo'];
    
    // Check if all required fields are filled
    if(empty($product_id) || empty($product_name) || empty($product_info) || empty($item_price) || empty($product_photo)){
        echo "Please fill all required fields.";
        exit;
    }

    // Check if file upload is successful
    if($product_photo['error'] !== UPLOAD_ERR_OK){
        echo "File upload failed. Please try again.";
        exit;
    }

    // Move uploaded file to destination folder
    $upload_directory = 'uploads/';
    $product_image_folder = $upload_directory . $product_photo['name'];
    if(!move_uploaded_file($product_photo['tmp_name'], $product_image_folder)){
        echo "Failed to move uploaded file to destination folder.";
        exit;
    }

    // Check if product ID already exists in the database
    $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE product_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $product_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    // Perform insert or update based on product ID existence
    if($num_rows > 0){
        // Update product in database
        $stmt = mysqli_prepare($conn, "UPDATE products SET product_name = ?, product_photo = ?, item_price = ?, product_info = ? WHERE product_id = ?");
        mysqli_stmt_bind_param($stmt, "sssss", $product_name, $product_image_folder, $item_price, $product_info, $product_id);
        if(mysqli_stmt_execute($stmt)){
            echo "Product updated successfully.";
        }else{
            echo "Failed to update product.";
        }
    }else{
        // Insert product into database
        $stmt = mysqli_prepare($conn, "INSERT INTO products (product_id, product_name, product_photo, item_price, product_info) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $product_id, $product_name, $product_image_folder, $item_price, $product_info);
        if(mysqli_stmt_execute($stmt)){
            echo "Product created successfully.";
        }else{
            echo "Failed to create product.";
        }
    }
    mysqli_stmt_close($stmt);
}
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
            <h2>Create Product</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <!-- Include a hidden input field to capture the product_id -->
                <label for="product_id">Product ID</label>
                <input type="text" name="product_id" placeholder="Product ID" >

                <label for="name">Name:</label>
                <input type="text" id="name" name="product_name" ><br><br>

                <!-- <label for="name">ID:</label>
                <input type="number" id="name" name="name"><br><br> -->



                <label for="info">Info:</label><br>
                <textarea id="info" name="product_info" rows="4" cols="50"></textarea><br><br>

                <label for="price">Price:</label>
                <input type="text" id="price" name="item_price" ><br><br>
          

                <label for="picture">Picture:</label>
                <input type="file" id="picture" accept="image/png, image/jpg, image/jpeg" name="product_photo"  ><br><br>

                <button type="submit" name="createProduct">Create Item</button>
            </form>
        </div>
    </div>
</body>
</html>

