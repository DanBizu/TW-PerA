<?php session_start();
    if(empty($_SESSION['username']))
    {
		header("Location: ./login.php?user=notloged");
		exit();
    } else {
      include '../PHP/loadFriendAct.php';
    }
?>
<!DOCTYPE html>
<html>

<head>
  <title> Friends </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../CSS/Friends.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    var currUser='<?php $currUser = $_SESSION['username'];
    echo "../JSON/$currUser.txt"; ?>';
  </script>
</head>

<body onload="loadActivities();">

  <div class="tableContainer" id="modalActivities">
    <span class="closeBtn" id="modalActivitiesClose">&times;</span>
    <div id="scrollTab">
      <table id="activityTable">
        <tr><td><b>Nume</b></td>
            <td><b>Data</b></td>
            <td><b>Locatia</b></td>
            <td><b>Ora start</b></td>
            <td><b>Durata</b></td>
        </tr>
      </table>
      <!--<div class="activityContainerButton">
        <table class="activityContainer">
          <tr>
            <th rowspan="2" class="activityName"> Tenis </th>
            <td class="activityHour">17.00-19.00</td>
          </tr>
          <tr>
            <td class="activityDate">23/06/2019</td>
          </tr>
        </table>
      </div>

      <div class="activityContainerButton">
        <table class="activityContainer">
          <tr>
            <th rowspan="2" class="activityName">Fotbal </th>
            <td class="activityHour">17.00-19.00</td>
          </tr>
          <tr>
            <td class="activityDate">23/06/2019</td>
          </tr>
        </table>
      </div>

      <div class="activityContainerButton">
        <table class="activityContainer">
          <tr>
            <th rowspan="2" class="activityName">Hochei </th>
            <td class="activityHour">17.00-19.00</td>
          </tr>
          <tr>
            <td class="activityDate">23/06/2019</td>
          </tr>
        </table>
      </div>

      <div class="activityContainerButton">
        <table class="activityContainer">
          <tr>
            <th rowspan="2" class="activityName">Baseball </th>
            <td class="activityHour">17.00-19.00</td>
          </tr>
          <tr>
            <td class="activityDate">23/06/2019</td>
          </tr>
        </table>
      </div>

      <div class="activityContainerButton">
        <table class="activityContainer">
          <tr>
            <th rowspan="2" class="activityName">Curling </th>
            <td class="activityHour">17.00-19.00</td>
          </tr>
          <tr>
            <td class="activityDate">23/06/2019</td>
          </tr>
        </table>
      </div>-->


    </div><!-- scrollTab -->
    
  </div>
  <!-- tableContainer -->

  <div class="modalAddFriend" id="modalAddFriend">
    <span class="closeBtn" id="modalAddClose">&times;</span>
    <div class="contentAddFriend">
      <div class="searchTab">
        <h3 class="pop-up-header">Search for a person</h3>
        <input id="searchInput" type="text" name="Search" placeholder="Search">
      </div>
      <div class="suggestionsTab">
        <h3 class="pop-up-header">Suggestions</h3>
        <table>
          <thead>
            <tr>
              <th>Nume</th>
              <th>Cunoscuti comuni</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nae Catavencu</td>
              <td class="common-friends">2</td>
            </tr>
            <tr>
              <td>Zaharia Trahanache</td>
              <td class="common-friends">2</td>
            </tr>
            <tr>
              <td>Zoe Trahanache</td>
              <td class="common-friends">2</td>
            </tr>
            <tr>
              <td>Pristanda</td>
              <td class="common-friends">2</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
    <!-- contentAddFriend -->


  </div>

  <div id="sidebar">
    <ul>
      <li class="sidebar-el">
        <a href="Home.php">
          <b>Home</b>
        </a>
      </li>
      <li class="sidebar-el">
        <a href="Friends.php" id="current-page">
          <b>Friends</b>
        </a>
      </li>
      <li class="sidebar-el">
        <a href="Contact.php">
          <b>About us</b>
        </a>
      </li>
      <li class="sidebar-el">
          <a href="../PHP/logout.lib.php">Logout</a>
        </a>
      </li>
    </ul>

    <i class="fa fa-bars" id="sidebar-button" onclick="ExpandSidebar()"></i>
  </div>

  <main>
    <header>
      <h1>Friends</h1>
    </header>
    <div class="FriendsTable">
    	<?php
    	include '../PHP/conn.php';
		$user = $_SESSION['username'];

		$query = "SELECT id FROM users WHERE username = '$user'";
		$result = @mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$user_id = $row["id"];
		//echo $user_id;

		//Afisare prieteni
		$query = "SELECT ID_user2 FROM friends WHERE ID_user1 = '$user_id'";
		$result = @mysqli_query($conn, $query);
		if($result){
			echo '<table><tr><td><b>Username</b></td></tr>';
			$json_array = array();
			while($row = mysqli_fetch_array($result)){
				$id = $row['ID_user2'];

				$getActQ = "SELECT username, name, date, location, start, duration FROM Activities a JOIN engage e ON e.activity_id = a.id AND e.user_id = $id  JOIN users u ON u.id = $id WHERE privacy LIKE 'Visible'";
				$resAct = @mysqli_query($conn , $getActQ);
				if($resAct){
					
					while($rowFA = mysqli_fetch_assoc($resAct)){
						$json_array[]=$rowFA;
					}
				}

				$query = "SELECT username FROM users WHERE id = '$id'";
				$result1 = @mysqli_query($conn, $query);

				if($result1) {	
					while($row1 = mysqli_fetch_assoc($result1)){
						echo '<tr><td class=Friend>' . $row1['username'] . "</td></tr>";
					}
				}
			}
			$file = fopen("../JSON/$user.txt", "w") OR DIE("Unable to open the file.");
			fwrite($file, json_encode($json_array));
			fclose($file);
			echo '</table>';
		}
    	?>
    </div>
    <!--<table class="FriendsTable">
      <tr id="header-row">
        <th>Profile</th>
        <th>Name</th>
      </tr>
      <tr>
        <td>
          <img src="../Images/Profile.png" class="profilePics" alt="Profile">
        </td>
        <td class="Friend">Popovici Popa</td>
        <td>
          <span class="RemoveFriend">&times;</span>
        </td>
      </tr>
      <tr>
        <td>
          <img src="../Images/Profile1.jpg" class="profilePics" alt="Profile">
        </td>
        <td class="Friend">Ionescu Ion</td>
        <td>
          <span class="RemoveFriend">&times;</span>
        </td>
      </tr>
      <tr>
        <td>
          <img src="../Images/Profile1.jpg" class="profilePics" alt="Profile">
        </td>
        <td class="Friend">Casperoconovici Sperietenescu</td>
        <td>
          <span class="RemoveFriend">&times;</span>
        </td>
      </tr>
      <tfoot>
        <tr>
          <td colspan="3">
            <button class="fa fa-plus-square-o" id="add-friend-btn"></button>
          </td>
        </tr>
      </tfoot>

    </table>
    -->

  </main>

  <script src="../JS/Friends.js"></script>
</body>

</html>
