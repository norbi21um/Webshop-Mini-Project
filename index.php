<!DOCTYPE html>
<html>
<head>
    <title>Music E-Commerce</title>
    <link rel="stylesheet" href="css/landing.css">
    <link rel="shortcut icon" href="img/logo1.png" />
</head>
<body class="fullscreen-bg">
	<video loop muted autoplay class="fullscreen-bg__video">
		<source src="img/vid3.mp4">
	</video>
	<a href="index.php">
		<img class="logo" src="img/logo1.png">
	</a>

	<!-- Log In / Sign Up / Username / Log Out -->

	<div id="headerbox">
    	<ol style="margin: 50px;">
        	<li>

<?php
session_start();
if (isset($_SESSION['username'])) {
	?>
	<div style="margin: 40px;">

	<?php
	echo $_SESSION['username'];
	?>
	| <a href="logout.php" style="padding: 0; margin: 0;">Log Out</a>
					</div>
	<?php
} else {
	?>
	<a href="signup.html" style="padding: 0; margin-right: 5px;">Sign Up</a>|
		<a href="loginn.php" style="padding: 0; margin: 0px; ">Log In
			<img id="loginpng" src="img/login2.png" alt="Company Logo">
		</a>
	<?php
}
?>

        	</li>
    	</ol>
	</div>

	<!-- Title -->
	<div class="vfkozepre">
	<div class="title">Music E-Commerce</div>
	<!-- Navigation Menu -->
	<div class="buttonBox">
    	<a href="guitars.php"><div class="button">Guitars</div></a>
	    <a href="guitars.php#amplifiers"><div class="button">Guitar Amplifiers</div></a>
    	<a href="guitars.php#accessories"><div class="button">Guitar Accessories</div></a>
	    <a href="guitars.php#contact"><div class="button">Contact</div></a>
    	<a href="guitars.php#about"><div class="button">About</div></a>
	</div>
	<div id="sources"></div>
	<br />
	</div>

	<!-- Footer -->

	<div class="lablec vCenter">
 		&copy; 2017,<a href="termsandservices.php">Terms of Services</a>
	</div>

</body>
</html>