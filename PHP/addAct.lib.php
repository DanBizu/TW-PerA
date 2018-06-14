<?php

if(isset($_POST['addActivity'])){
    session_start(); 
    include_once 'conn.php';

    $activityName =  htmlspecialchars(mysqli_real_escape_string ($conn , $_POST['activityName']));
    $activityType = mysqli_real_escape_string ($conn , $_POST['activityType']);
    $activityDate = mysqli_real_escape_string ($conn , $_POST['activityDate']);
    $activityLocation =  htmlspecialchars(mysqli_real_escape_string ($conn , $_POST['activityLocation']));
    $activityStart = mysqli_real_escape_string ($conn , $_POST['activityStart']);
    $activityDuration = mysqli_real_escape_string ($conn , $_POST['activityDuration']);
    $activityRepeat = mysqli_real_escape_string ($conn , $_POST['activityRepeat']);
    $activitiPrivacy = mysqli_real_escape_string ($conn , $_POST['activitiPrivacy']);

    $quary = "Select * from activities where name='$activityName' and type='$activityType' and date='$activityDate' and location='$activityLocation' and start='$activityStart' "  ;
    $sql = mysqli_num_rows(mysqli_query($conn , $quary));

    if($sql > 0) {
        header("Location: ../HTML/Home.php?activity=exists");
        exit();
    }
    else {
        $insert = "insert into activities (name	, type	, date	, location	, start	, duration	, repetition, privacy) values ('$activityName','$activityType','$activityDate', '$activityLocation','$activityStart', '$activityDuration ','$activityRepeat' , '$activitiPrivacy') ;";
        mysqli_query($conn , $insert);
        echo("-----------") ;
        $ceva =  "Select * from activities where name='$activityName' and type='$activityType' and date='$activityDate' and location='$activityLocation' and start='$activityStart' " ;
        $sql = mysqli_query($conn , $ceva) ;
        $activityId = mysqli_fetch_assoc($sql);
        $actId = $activityId['id'] ;
        $userId = $_SESSION['id'];
        $insert = "insert into engage (user_id , activity_id) values ('$userId' ,  '$actId') ;";
        mysqli_query($conn , $insert);
        header("Location: ../HTML/Home.php?activity=added");
        exit();
    }
}
else {
    header("Location:../HTML/login.php");
    exit();
}