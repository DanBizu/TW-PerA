<?php session_start();
?>

<!DOCTYPE html>

<html>

<head>

    <title> Login </title>
    <link rel="stylesheet" href="../css/login.css">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body>

    <?php
    if (isset($_GET['user'])) {
        echo "<script type='text/javascript'>alert('Please log in first');</script>";
    } elseif (isset($_GET['username'])) {
            echo "<script type='text/javascript'>alert('Username already taken try again');</script>";
        }
    ?>

    <div class='loginBox' id="loginBox">
        <h1 id='loginHeader'>Login</h1>
        <form method="post" method="POST" action="../PHP/login.lib.php">
            <div>
                <label for="User">Username</label>
                <input type="text" id="User" name="username" placeholder="User" required>
                <br>
            </div>
            <div>
                <label for="Pass">Password</label>
                <input type="password" id="Pass" name="pass" placeholder="Password" required>
                <br>
            </div>
            <div id="controlPanel">
                <div id="submitDiv">
                    <input type="submit" name="Login" value="Login">
                </div>
                <div id="registerDiv">
                    <div id="registerButton" onclick="Transition()">Register</div>
                </div>
            </div>
        </form>
    </div>

    <div class='registerBox' id="registerBox">
        <h1 id='registerHeader'>Register</h1>
        <form method="post" method="POST" action="../PHP/register.lib.php">
            <div>
                <label for="registerUser">Username</label>
                <input type="text" id="registerUser" name="registerUser" placeholder="User" required>
                <br>
            </div>
            <div>
                <label for="registerPass">Password</label>
                <input type="password" id="registerPass" name="registerPass" placeholder="Password" required>
                <br>
            </div>
            <div>
                <label for="registerEmail">Email</label>
                <input type="email" id="registerEmail" name="registerEmail" placeholder="Email" required>
                <br>
            </div>
            <input type="submit" name="Register" value="Register">
        </form>
    </div>


    <script src="../JS/Login.js"></script>
</body>

</html>
