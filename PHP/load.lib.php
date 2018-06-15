<?php
    include_once 'conn.php';
    $userId = $_SESSION['id'];
    $userUsername = $_SESSION['username'];
    $sql="Select * from activities , engage where activity_id=id and user_id='$userId'";
    $result = mysqli_query($conn, $sql);
    $json_array = array();
    $myfile = fopen("../JSON/$userUsername.txt", "w") or die("Unable to open file!");

    while ($entry=mysqli_fetch_assoc($result)) {
        $json_array[]=$entry;
    }
    fwrite($myfile, json_encode($json_array));
    fclose($myfile);
