<!-- Connecting to the database -->
<?php

$host     = "192.168.56.101";
$port     = 3306;
$socket   = "";
$user     = "root";
$password = "P@ssw0rd";
$dbname   = "mywebshop";

$con = mysqli_connect($host, $user, $password, $dbname, $port, $socket);

if (!$con) {die('Could not connect to the database server'.mysqli_connect_error());
}

session_start();

$idCustomer = $_SESSION['idCustomer'];

//Delete the Items from the logged in user's cart (Order table)

$query = "DELETE FROM `Order` WHERE idCustomer = '$idCustomer'";

$result = mysqli_query($con, $query);

mysqli_close($con);
//End Connection and log out

session_destroy();
header('Location: /index.php');

?>