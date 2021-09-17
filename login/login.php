<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>
<body>
<?php

    session_start();
    require('../config.php');
    // When form submitted, check and create user session.
    //echo core_encrypt('khaana');
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $num_rows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if ($num_rows == 1) {
            $_SESSION['useremail'] = $username;
            $_SESSION['roleid'] = $row['role_id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['userid'] = $row['id'];
            // Redirect to user dashboard page
            header("Location: ../main.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <!-- <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p> -->
  </form>
<?php
    }
?>
</body>
</html>
