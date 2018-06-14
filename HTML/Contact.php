<?php session_start();
    if(empty($_SESSION['username']))
    {
		header("Location: ./login.php?user=notloged");
		exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title> Contact </title>
	<link rel="stylesheet" href="../CSS/Contact.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
	<script src="../JS/Contact.js"></script>
</head>

<body>

	<div id="sidebar">

		<ul>
			<li class="sidebar-el">
				<a href="Home.php">Home</a>
			</li>
			<li class="sidebar-el">
				<a href="Friends.php">Friends</a>
			</li>
			<li class="sidebar-el">
				<a href="Contact.php" id="active">About us</a>
			</li>
			<li class="sidebar-el">
				<a href="../PHP/logout.lib.php">Logout</a>
			</li>
		</ul>

		<i class="fa fa-bars" id="sidebar-button" onclick="ExpandSidebar()"></i>

	</div>
	<div class="mainAbout">

		<div id="quote">
			"Regret for wasted time is more wasted time. - Mason Cooley"
		</div>

		<div id="aboutUs">Phone:0000000000</div>

		<div id="aboutUs2">Fax:0101010101</div>

		<div id="aboutUs3">Addres: Str Unknown</div>

		<div id="aboutUs4">Something else</div>

		<div id="socialMedia">
			<a href="https://www.facebook.com">
				<i class="fa fa-facebook-official"></i>
			</a>
			<a href="https://www.twitter.com">
				<i class="fa fa-twitter-square"></i>
			</a>
			<br>
			<a href="https://github.com/DanBizu/TW-PerA">
				<i class="fa fa-github"></i>
			</a>
			<a href="https://www.google.ro/">
				<i class="fa fa-google-plus"></i>
			</a>
			<br>
			<a href="https://www.reddit.com/r/funny">
				<i class="fa fa-reddit-alien"></i>
			</a>
			<a href="https://www.reddit.com/r/Jokes/">
				<i class="fa fa-tumblr-square"></i>
			</a>
		</div>





	</div>


</body>

</html>
