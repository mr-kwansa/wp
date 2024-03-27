<?php




ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);


// $errors = array ();

// //create post

// if(isset($_POST['createProduct'])){
//     //recieve all input from the create form


//     require "connection.php";

//     $product_id = $_POST['product_id'];
//     $product_name = $_POST['product_name'];
//     $product_info = $_POST['product_info'];
//     $item_price = $_POST['item_price'];
//     $product_photo = $_FILES['product_photo']['name'];


    


//     //form validation: ensure that the form is properly filled
//     if(empty($product_id)){ array_push($errors,'Please give your product a unique ID');}
//     if(empty($product_name)){ array_push($errors,'Please name your Product');}
//     if(empty($item_price)){ array_push($errors,'Hi! How much is your item? Enter the price and try again');}
//     if(empty($product_photo)){ array_push($errors,'Select a photo of your item.');}

//     //process item photo
//     if($product_photo){
//         //upload photo to folder
//         require_once ('../utils/photo_manager.php');
//     }


//     if(empty($errors)){
//         $new_photo = $newFileName;


//         //create product
//         $stmt = mysqli_prepare($conn,"INSERT INTO products (product_id, product_name, product_photo, item_price, product_info)VALUES (?,?,?,?,?)");

//         mysqli_stmt_bind_param($stmt,"sssss", $product_id, $product_name, $new_photo, $item_price, $product_info);
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_close($stmt);


//         echo '<div class="alert alert-success" role="alert">'."Post added successfully".'</div>'; 

//     }
//     if ($errors){
//         foreach ($errors as $error){
//             echo "<p class='text-danger text-center m-1'><strong>$error</strong></p>";
//         }
//     }


// }<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);

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















