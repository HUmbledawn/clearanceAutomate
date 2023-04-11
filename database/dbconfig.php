<?php date_default_timezone_set('Asia/Manila'); ?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "barangayloma";
$conn = new mysqli($host,$username,$password,$database);

if ($conn->connect_error) {
    echo $conn->connect_error;
}else {
mysqli_query($conn, "SET SESSION time_zone = 'Asia/Manila'");
    return $conn;
}
?>