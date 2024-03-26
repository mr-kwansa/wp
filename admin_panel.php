
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
                <input type="file" id="picture" name="product_photo"  ><br><br>

                <button type="submit" name="createProduct">Create Item</button>
            </form>
        </div>
    </div>
</body>
</html>
