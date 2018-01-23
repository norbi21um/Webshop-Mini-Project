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

//Ending the session - Logging out

session_start();

session_destroy();

mysqli_close($con);

header('Location: /index.php');

?>