<!-- Connecting to the Database -->
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
//Deleting the currently logged in user's account
session_start();

$idCustomer = $_SESSION['idCustomer'];

$query = "DELETE FROM Customer WHERE idCustomer = '$idCustomer'";

$result = mysqli_query($con, $query);

mysqli_close($con);

session_destroy();
header('Location: /index.php');

?>