<!-- If there's a session in progress the page worn't load -->
<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: /index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music E-Commerce|Login</title>
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
    <!-- Top Menu -->
    <div id="headerbox">
        <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="guitars.php#about">About</a></li>
            <li><a href="guitars.php#contact">Contact</a></li>
            <li><a href="signup.html">Sign Up</a></li>
        </ol>
    </div>
    <!-- Log In Form -->
    <div class="vfkozepre">
        <div class="container">
            <h1>Log in to your account</h1>
            <form action="./login.php" method="post">
                <div class="form-input">
                    <input id="top" type="text" name="Username" placeholder="Username">
                </div>
                <div class="form-input">
                    <input type="Password" name="Password" placeholder="Password">
                </div>
                <div>
                    <input type="Submit" value="Login" class="btn-login">
                </div>
            </form>
        </div>
        <br />
    </div>
    <!-- Footer -->
    <div class="lablec vCenter">
        &copy; 2017,<a href="termsandservices.php">Terms of Services</a>
    </div>

</body>
</html>