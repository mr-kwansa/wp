<?php

// ini_set ('display_errors', 'on');
// ini_set ('log_errors', 'on');
// ini_set ('display_startup_errors', 'on');
// ini_set ('error_reporting', E_ALL);


// // Include the database connection file
// include 'connection.php';




// Check if the form was submitted and the product_id is set
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitBtn'])) {
//     // Get data from form
//     $product_id = $_POST['product_id'];
//     $name = $_POST['name'];
//     $price = $_POST['price'];
//     $info = $_POST['info'];

    // Process the uploaded image file
    // $picture = $_FILES['picture']['name']; // Get the name of the uploaded file
    // $target_dir = "uploads/"; // Directory where the file will be stored
    // $target_file = $target_dir . basename($_FILES["picture"]["name"]); // Path of the uploaded file on the server

    // Check if file was uploaded successfully
    // if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        // File uploaded successfully, proceed with database update
        // Use prepared statement to prevent SQL injection
        // $sql = mysqli_prepare($conn, "INSERT INTO products (name, picture, price, info)VALUES(?,?,?,?)");
        // mysqli_stmt_bind_param($stmt, "ssisiss", $title, $body, $category_id, $new_thumbnail, $author_id, $title_slug, $video);
        // mysqli_stmt_execute($stmt);
        // mysqli_stmt_close($stmt);
        // $sql = "UPDATE products SET name=?, picture=?, price=?, info=? WHERE id=?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("ssdsi", $name, $picture, $price, $info, $product_id);

//         if ($stmt->execute()) {
//             echo "Product updated successfully";
//             // Close the prepared statement
//             $stmt->close();
//         } else {
//             echo "Error updating product: " . $conn->error;
//         }
//     } else {
//         // Error uploading file
//         echo "Sorry, there was an error uploading your file.";
//     }

//     // Close the database connection
//     $conn->close();
// } else {
//     // Product ID is not set or form not submitted
//     echo "Error: Product ID is not set or form not submitted.";
// }
// ?>
