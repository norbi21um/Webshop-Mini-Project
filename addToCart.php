<!-- Server connection -->
<?php

$servername = "localhost";
$username   = "root";
$password   = "P@ssw0rd";
$dbname     = "mywebshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}
//Loging in
session_start();

$idProduct  = $_GET["idProduct"];
$idCustomer = $_SESSION['idCustomer'];

$sql = "INSERT INTO `Order` (idCustomer, idProduct)
VALUES ('$idCustomer', '$idProduct')";

mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: /guitars.php');

?>