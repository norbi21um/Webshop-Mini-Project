<!-- Connecting to the database -->
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
	<title>Music E-Commerce|Guitars</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="shortcut icon" href="img/logo1.png"/>
</head>
<body>
	<!-- Sign Up / Log In / Log out / Username -->
	<div class="header">
		<div style="float: right; color: white; font-size: 50%;">
<?php
session_start();
if (isset($_SESSION['username'])) {
	?>


	<?php
	echo $_SESSION['username'];
	?>
	| <a href="logout.php" style="padding: 0; margin: 0;">Log Out</a>

	<?php
} else {
	?>
	<a href="signup.html" style="padding: 0; margin-right: 5px;">Sign Up</a>|
				<a href="loginn.php" style="padding: 0; margin: 0px; ">Log In
					<img class="loginpic" src="img/login2.png" alt="Company Logo">
				</a>


	<?php

}?>
</div>
		<a href="index.php"><h2><img id="headerlogo" src="img/headerlogo.png"></h2></a>
	</div>

	<!-- Manu bar -->
	<div class="topnav">
		<a href="index.php">Home</a>
		<a href="#guitars">Guitars</a>
		<a href="#amplifiers">Guitar Amplifiers</a>
		<a href="#accessories">Guitar Accessories</a>
		<a href="#contact">Contact</a>
		<a href="#about">About</a>
<?php
session_start();
if (isset($_SESSION['username'])) {
	?>
	<a href="cart.php" style="float:right"><img id="cartlogo" src="img/cart.png">Cart</a>
	<?php
} else {
	?>
	<a href="loginn.php" style="float:right"><img id="cartlogo" src="img/cart.png">Cart</a>
	<?php
}?>
</div>
<div class="row">

	<!-- Left column / Guitars -->
		<div class="leftcolumn">
			<div class="card" id="guitars">
				<h2>Guitars</h2>
				<table id="customers">
					<tr>
						<th>Item</th>
						<th>Describtion</th>
						<th>Price</th>
						<th>Order</th>
					</tr>
<?php
$sql    = "SELECT  idProduct, ProductName, Description, Price FROM Product WHERE Type='Guitar'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "<tr>"."<td>".$row["ProductName"]."</td>";
		echo "<td>".$row["Description"]."</td>";
		echo "<td>".$row["Price"]."&euro;"."</td>";
		?>
		<td><a
		<?php
		session_start();
		if (isset($_SESSION['username'])) {
			?>
						href="./addToCart.php?idProduct=<?php echo $row["idProduct"]?>"
			<?php
		} else {
			?>
			href="loginn.php"
			<?php
		}?>
		class="button">Order</a></td>

		<?php
	}
} else {
	echo "0 results";
}
?>
</table>
			</div>

			<!-- Amplifiers -->
			<div class="card" id="amplifiers">
				<h2>Guitar Amplifiers</h2>
				<table id="customers">
					<tr>
						<th>Item</th>
						<th>Describtion</th>
						<th>Price</th>
						<th>Order</th>
					</tr>

<?php
$sql    = "SELECT  idProduct, ProductName, Description, Price FROM Product WHERE Type='Amp'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "<tr>"."<td>".$row["ProductName"]."</td>";
		echo "<td>".$row["Description"]."</td>";
		echo "<td>".$row["Price"]."&euro;"."</td>";
		?>
		<td><a
		<?php
		session_start();
		if (isset($_SESSION['username'])) {
			?>
						href="./addToCart.php?idProduct=<?php echo $row["idProduct"]?>"
			<?php
		} else {
			?>
			href="loginn.php"
			<?php
		}?>
		class="button">Order</a></td>

		<?php
	}
} else {
	echo "0 results";
}
?>
</table>
			</div>

			<!-- Accessories -->
			<div class="card" id="accessories">
				<h2>Guitar Accessories</h2>
				<table id="customers">
					<tr>
						<th>Item</th>
						<th>Describtion</th>
						<th>Price</th>
						<th>Order</th>
					</tr>
<?php
$sql    = "SELECT  idProduct, ProductName, Description, Price FROM Product WHERE Type='Acc'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "<tr>"."<td>".$row["ProductName"]."</td>";
		echo "<td>".$row["Description"]."</td>";
		echo "<td>".$row["Price"]."&euro;"."</td>";
		?>
		<td><a
		<?php
		session_start();
		if (isset($_SESSION['username'])) {
			?>
						href="./addToCart.php?idProduct=<?php echo $row["idProduct"]?>"
			<?php
		} else {
			?>
			href="loginn.php"
			<?php
		}?>
		class="button">Order</a></td>

		<?php
	}
} else {
	echo "0 results";
}
?>
</table>
			</div>
		</div>

		<!-- Right Column / About Us -->
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
<?php
$conn->close();
?>
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
</html>