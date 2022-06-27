<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php
    // Include db file
    require('db.php');
    // Initialize the session
    session_start();

    if (isset($_POST['id'])) {
        $id = stripslashes($_REQUEST['id']);    // removes backslashes
        $id = mysqli_real_escape_string($con, $id);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE id='$id'
                     AND password='" . md5($password) . "'";

        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['password'] = $password;
            // User is admin
            if ($_SESSION['id'] == '111111111') {
                // Redirect to user update page
                header("Location: adminDashboard.php");
            } else {
                // Redirect to user dashboard page
                header("Location: userDashboard.php");
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="id" placeholder="ID Number" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>