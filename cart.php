<!-- Connection to the database -->
<?php
$servername = "localhost";
$username   = "root";
$password   = "P@ssw0rd";
$dbname     = "mywebshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Music E-Commerce|Cart</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="shortcut icon" href="img/logo1.png" />
</head>
<body>

	<!-- Log in/Log out/Username -->
	<div class="header">
		<div style="float: right; color: white; font-size: 50%;">
<?php
session_start();
if (isset($_SESSION['username'])) {

	echo $_SESSION['username'];
	?>
	| <a href="logout.php">Log Out</a>
	<?php
} else {
	?>
	<a href="loginn.php" style="padding: 10px; border-style: solid;
									border-width: 2px;">Log In
									<img class="loginpic" src="img/login2.png" alt="Company Logo">
								</a>

	<?php

}?>
</div>
	<a href="index.php"><h2><img id="headerlogo" src="img/headerlogo.png"></h2></a>

	<!-- Menu Bar -->
	</div>
	<div class="topnav">
		<a href="index.php">Home</a>
		<a href="guitars.php">Guitars</a>
		<a href="guitars.php#amplifiers">Guitar Amplifiers</a>
		<a href="guitars.php#accessories">Guitar Accessories</a>
		<a href="guitars.php#contact">Contact</a>
		<a href="guitars.php#about">About</a>
		<a href="#" style="float:right"><img id="cartlogo" src="img/cart.png">Cart</a>
	</div>

	<!-- Shopping Cart / Left column-->

<div class="row">
		<div class="leftcolumn">
			<div class="card" >
				<h2>Shopping cart</h2>
				<table id="customers">
					<tr>
						<th>Item</th>
						<th>Describtion</th>
						<th>Prices</th>
					</tr>

<?php
session_start();
$idCustomer = $_SESSION['idCustomer'];

$sql    = "SELECT  idProduct FROM `Order` WHERE idCustomer='$idCustomer'";
$result = $conn->query($sql);
$total  = 0;

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {

		$productINeed = $row["idProduct"];

		$products = "SELECT  idProduct, ProductName, Description, Price FROM Product WHERE idProduct = '$productINeed'";
		$products = $conn->query($products);

		while ($prow = $products->fetch_assoc()) {

			echo "<tr>"."<td>".$prow["ProductName"]."</td>";
			echo "<td>".$prow["Description"]."</td>";
			echo "<td>".$prow["Price"]."&euro;"."</td>";
			$total += $prow["Price"];
		}
	}
} else {
	echo "<tr>"."<td>"."No Item Selected"."</td>";
	echo "<td>"."No Item Selected"."</td>";
	echo "<td>"."0 &euro;"."</td>";
}
?>
</table>
<h2>In total: <?php echo $total;
?>&euro;
</h2>
			</div>
			<div class="card" id="amplifiers">
				<h2>Would You like to continue shopping?</h2>
				<div id="#inner">
					<a href="guitars.php" class="button">Continue Shopping</a>
					<a href="pay.php" class="button">Pay</a>
				</div>

			</div>

		</div>

		<!-- About Us / Right column -->

		<div class="rightcolumn" id="about">
			<div class="card">
				<h2>About Us</h2>

				<p>This is a new Hungarian webshop that aims to provide faster and more reasonably priced services.</p>
			</div>

			<!-- Contact Us -->
			<div class="card" id="contact">
				<h3>Contact Us</h3>
				<p>+36/30-1264-235</p>
				<p>Budapest, V. District Hold Street 15.</p>
				<p>info@musicecommerce.com</p>
			</div>

			<!-- Social Media Links -->
			<div class="card">
				<h3>Follow Us</h3>
				<p>Follow us on social media.</p><br>
				<img id="icons" src="img/icons.png">
			</div>
		</div>
	</div>

	<!-- Footer -->

	<div class="footer">
		<h2>&copy; 2017, <a href="termsandservices.php">Terms of Services</a></h2>
<?php
session_start();
if (isset($_SESSION['username'])) {
	?>
	<a href="deleteAccount.php">Delete my account!</a>
	<?php
}
?>
</div></body>
<?php
$conn->close();
?>
</html>