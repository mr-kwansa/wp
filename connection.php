<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "compushop";  

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    exit("Connection failed: " . mysqli_connect_error());
}

