<?php
require ("connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-form">
        <h2>Admin Login</h2>
        <form method="POST" action="">
            <div class="input-field">
                <input type="text" placeholder="username" name="adminname">
            </div>
            <div class="input-field">
                <input type="password" placeholder="password" name="adminpassword">
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <?php

    if(isset($_POST['login']))
    {
        $query="SELECT * from `admin_login` WHERE `admin_name`='$_POST[adminname]' AND `admin_password`='$_POST[adminpassword]'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['adminloginid']=$_POST['adminname'];
            header("location: adminpanel.php");

        }
        else
        {
            echo "<script>alert('Invalid Username or Password');</script>";
        }
    }

    ?>
</body>
</html>