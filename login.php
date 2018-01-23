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

//Loging in
$username = $_POST["Username"];
$password = $_POST["Password"];

$query = "SELECT idCustomer FROM Customer WHERE Name='$username' AND Password='$password'";

$result = mysqli_query($con, $query);

if (!$result) {die('Error executing query '.mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {

	mysqli_close($con);

	header('Location: /loginn.php');
} else {

	session_start();

	$_SESSION['idCustomer'] = $row['idCustomer'];
	$_SESSION['username']   = $username;

	mysqli_close($con);

	header('Location: /guitars.php');
}

?>