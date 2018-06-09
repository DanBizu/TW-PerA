<?php

if(isset($_POST['modActivity'])){
    session_start(); 
    include_once 'conn.php';
    $activityId = mysqli_real_escape_string ($conn , $_POST['activityId']);
    $activityName = mysqli_real_escape_string ($conn , $_POST['activityName']);
    $activityType = mysqli_real_escape_string ($conn , $_POST['activityType']);
    $activityDate = mysqli_real_escape_string ($conn , $_POST['activityDate']);
    $activityLocation = mysqli_real_escape_string ($conn , $_POST['activityLocation']);
    $activityStart = mysqli_real_escape_string ($conn , $_POST['activityStart']);
    $activityDuration = mysqli_real_escape_string ($conn , $_POST['activityDuration']);
    $activityRepeat = mysqli_real_escape_string ($conn , $_POST['activityRepeat']);
    $activitiPrivacy = mysqli_real_escape_string ($conn , $_POST['activitiPrivacy']);

    $quary = "Select * from activities where id='$activityId' "  ;
    $sql = mysqli_num_rows(mysqli_query($conn , $quary));

    if($sql < 1) {
        header("Location: ../HTML/Home.php?activity=!exists");
        exit();
    }
    else {
        $update = "Update activities Set name='$activityName' , type='$activityType' , date='$activityDate'	, location='$activityLocation'	, start='$activityStart'	, duration='$activityDuration '	, repetition='$activityRepeat'  , privacy='$activitiPrivacy' where id='$activityId' ";
        mysqli_query($conn , $update);
        header("Location: ../HTML/Home.php?activity=added");
        exit();
    }
}
else {
    header("Location:../HTML/login.php");
    exit();
}