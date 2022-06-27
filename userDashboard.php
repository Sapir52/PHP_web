<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <br><br>

    <h1 class="login-title"><p>Hey, <?php echo $_SESSION['id']; ?>!</p></h1>
    <h3 class="login-title">Welcome to user page</h3>
    <form  class="user-form"  method="post" action="indexUser.php?edit=<?php echo $_SESSION['id']; ?>">
        <button type="submit" name="update" class="user-button">Edit User</button>
    </form>
    <form  class="user-form"  method="post" action="indexEvent.php">
          <button type="submit" name="" class="user-button">Edit Event</button>      
    </form>
    <form  class="user-form"  method="post" action="indexCalendar.php">
          <button type="submit" name="" class="user-button">Event Calendar</button>      
    </form>
    <form  class="user-form"  method="post" action="logout.php">
        <button type="submit" name="logout" class="user-button">Logout</button>
    </form>
</body>
</html>
