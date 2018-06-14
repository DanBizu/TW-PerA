<?php

if(isset($_POST['deleteAct'])){
    session_start(); 
    include_once 'conn.php';
    $activityId = mysqli_real_escape_string ($conn , $_POST['activityId']);
    $userId = $_SESSION['id'];

    $sql="Delete from engage where activity_id ='$activityId' and user_id='$userId'";
    mysqli_query($conn , $sql);
    $sql="Select * from engage where activity_id ='$activityId'";
    $result =  mysqli_query($conn , $sql);
    if(mysqli_num_rows($result)<1){ 
        $sql="Delete from activities where id ='$activityId'";
        mysqli_query($conn , $sql);
    }
    header("Location:../HTML/Home.php");
}
 else {
    header("Location:../HTML/login.php");
    exit();
}