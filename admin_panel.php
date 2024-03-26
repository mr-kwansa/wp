<?php 

include("connection.php");

if(isset($_POST["createProduct"])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_info = $_POST['product_info'];
    $item_price = $_POST['item_price'];
    $product_photo = $_FILES['product_photo']['name'];
    $product_image_temp_name = $_FILES['product_photo']['tmp_name'];
    $product_image_folder = 'uploads/' .$product_photo;


    $stmt = mysqli_prepare($conn,"INSERT INTO products (product_id, product_name, product_photo, item_price, product_info)VALUES (?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt,"sssss", $product_id, $product_name, $product_photo, $item_price, $product_info);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // $insert_query=mysqli_query($conn,'INSERT INTO products (product_id, product_name, product_photo, item_price, product_info)VALUES ("product_id","product_name", "product_info", "item_price", "product_photo")') or die("Create Item Operation Failed");

    if($stmt){
        move_uploaded_file($product_image_temp_name,$product_image_folder);
        echo "Producted created successfully";
    }else{
        echo "Product failed to create";



    }

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
