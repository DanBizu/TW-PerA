<?php session_start();
    if (empty($_SESSION['username'])) {
        header("Location: ./login.php?user=notloged");
        exit();
    } else {
        include '../PHP/load.lib.php';
        include '../PHP/clean.lib.php';
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title> Home </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/Home.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
	var userUsername='<?php
    $userUsername = $_SESSION['username'];
     echo "../JSON/$userUsername.txt";?>';
    </script>
</head>

<body onload="loading();">
	<div id="sidebar">
		<ul>
			<li class="sidebar-el">
				<a href="Home.php" id="active"><b>Home</b></a>
			</li>
			<li class="sidebar-el">
				<a href="Friends.php"><b>Friends</b></a>
			</li>
			<li class="sidebar-el">
				<a href="Contact.php"><b>About us</b></a>
			</li>
			<li class="sidebar-el">
				<a href="../PHP/logout.lib.php"><b>Logout</b></a>
			</li>
		</ul>
		<i class="fa fa-bars" id="sidebar-button" onclick="ExpandSidebar()"></i>


	</div>


	<div class="modalEdit" id="modalEditAdd">
		<div class="modalContent" id="modalContentAdd">
			<span class="modalClose" id="formClose" data-modal="modalEditAdd" onclick="closeAddForm()">&times;</span>

			<form action="../PHP/addAct.lib.php" method="POST">
				Activity Name:
				<input type="text" name="activityName" paceholder="CEva" required>
				<br>Activity date:
				<input type="date" name="activityDate" required>
				<br>Activity time:
				<input type="time" value="activityStart" name="activityStart" required>
				<br>Duration:
				<input type="number" min=1 max=24 name="activityDuration" required>
				<br> How Often :
				<select  name="activityRepeat" required>
					<option value="Daily">Daily</option>
					<option value="Weekly">Weekly</option>
					<option value="Monthly">Monthly</option>
					<option value="Once">Only Once</option>
				</select>
				<br> Location:
				<input type="text" name="activityLocation" required>
				<br> Type of activity:
				<select  name="activityType" required>
					<option value="Sport">Sport</option>
					<option value="Work">Work</option>
					<option value="School">School</option>
					<option value="Personal">Personal</option>
					<option value="Other">Other</option>
				</select>
				<br> Visibility:
				<select  name="activitiPrivacy" required>
					<option value="Visible">Visible</option>
					<option value="Private">Private</option>
				</select>
				<br>
				<input type="submit" name="addActivity" value="Submit">
			</form>
		</div>
	</div>

	<div id="modalList">
	</div>

	<div class="tableContainer" id="tableContainer1">
		<button type="button" id="addButton" class="fa fa-plus-square-o"  data-modal="modalEditAdd" onclick="openAddForm('addButton')"></button>
		<div id="scrollTab">
		</div>
	</div>

	<script src="../JS/Home1.js"></script>


</body>

</html>
