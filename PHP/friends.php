<?php
include 'conn.php';
$user = $_SESSION['username'];

$query = "SELECT id FROM users WHERE username = '$user'";
$result = @mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$user_id = $row["id"];

//Afisare prieteni
$query = "SELECT ID_user2 FROM friends WHERE ID_user1 = '$user_id'";
$result = @mysqli_query($conn, $query);
if($result){
		echo '<table><tr><td><b>Username</b></td></tr>';
		while($row = mysqli_fetch_array($result)){
			$id = $row['ID_user2'];
			$query = "SELECT username FROM users WHERE id = '$id'";
			$result1 = @mysqli_query($conn, $query);

			if($result1) {	
				while($row1 = mysqli_fetch_assoc($result1)){
					echo '<tr><td>' . $row1['username'] . "</td></tr>";
				}
			}
		}
		echo '</table>';
	}



/*
function getUserData( $user_id ){
	$query = "SELECT * FROM users WHERE id = '$user_id'";
	$result = @mysqli_query($conn, $query);

	if($result) {	
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr><td>' . $row["username"] . "</td></tr>";
		}
	}
}

function getFriends( $user_id ){
	$query = "SELECT ID_user2 FROM friends WHERE ID_user1 = '$user_id'";
	$result = @mysqli_query($conn, $query);
	if($result){
		echo "penis 2";
		echo '<table class="FriendsTable"><tr><td><b>Username</b></td></tr>';
		while($row = mysqli_fetch_assoc($result)){
			$id = $result["ID_user2"];
			getUserData( $id);
		}
		echo '</table>';
	}
}

getFriends($user_id);
/*
echo $user . "<br>";
$var = 'select * from users where username= "$user"';
$res = mysqli_query($conn, $var);

$row = mysqli_fetch_assoc($res);
echo "user:" . $row["username"];*/