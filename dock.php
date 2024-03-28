<?php 
require_once('connection.php');
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Table</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Product Table</h1>
    <table>
        <thead>
            <tr>
                <th>product_id</th>
                <th>product_name</th>
                <th>product_info</th>
                <th>item_price</th>
                <th>product_photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row["product_id"]?></td>
                <td><?php echo $row["product_name"]?></td>
                <td><?php echo $row["product_info"]?></td>
                <td><?php echo $row["item_price"]?></td>
                <td><img src="<?php echo $row["product_photo"]?>" alt="Product Image" class="product-image" class="product_image"></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
