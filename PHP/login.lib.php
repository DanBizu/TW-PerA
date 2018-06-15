<?php

session_start();

if (isset($_POST['Login'])) {
    include_once 'conn.php';

    $Username = mysqli_real_escape_string($conn, $_POST['username']);
    $Password = mysqli_real_escape_string($conn, $_POST['pass']);

    $quary = "Select * from users where username='$Username'";
    $sql = mysqli_query($conn, $quary);

    if (mysqli_num_rows($sql) < 1) {
        header("Location: ../HTML/login.php?user=unknown");
        exit();
    } else {
        if ($result = mysqli_fetch_assoc($sql)) {
            $securePasswordCheck = password_verify($Password, $result['password']);
            if ($securePasswordCheck == false) {
                header("Location: ../HTML/login.php?user=unknown");
                exit();
            } elseif ($securePasswordCheck == true) {
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['email'] = $result['email'];
                header("Location: ../HTML/Home.php");
                exit();
            }
        }
    }
} else {
    header("Location:../HTML/login.php");
    exit();
}
