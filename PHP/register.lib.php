<?php

if(isset($_POST['Register'])){

    include_once 'conn.php';

    $Username = mysqli_real_escape_string ($conn , $_POST['registerUser']);
    $Password = mysqli_real_escape_string ($conn , $_POST['registerPass']);
    $Email = mysqli_real_escape_string ($conn , $_POST['registerEmail']);

    $quary = "Select * from users where username='$Username'";
    $sql = mysqli_num_rows(mysqli_query($conn , $quary));

    if($sql > 0) {
        header("Location: ../HTML/login.php?username=taken");
        exit();
    }
    else {
        $securePassword = password_hash($Password , PASSWORD_BCRYPT);
        $quary = "Insert into Users (username , password , email ) values ('$Username' , '$securePassword' , '$Email')";
        mysqli_query($conn , $quary);
        header("Location: ../HTML/login.php?register=success");
        exit();
    }
}
else {
    header("Location:../HTML/login.php");
    exit();
}
