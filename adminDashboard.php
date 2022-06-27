<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body> 
        <br><br>
        <form class="user-form"  method="post" action="search.php">    
        <h3 class="login-title">Welcome to admin page</h3>    
        <h1 class="login-title"><p>Hey, <?php echo $_SESSION['id']; ?>!</p></h1>
          <input type="text" name="first_name"  placeholder="Search first_name..">
          <button type="submit" name="search" class="user-button">Search</button>      
        </form>
        <form  class="user-form"  method="post" action="indexSearch.php">
          <button type="submit" name="" class="user-button">User Management</button>      
        </form>
        <form  class="user-form"  method="post" action="indexCalendar.php">
          <button type="submit" name="" class="user-button">Event Calendar</button>      
        </form>
        <form  class="user-form"  method="post" action="logout.php">
          <button type="submit"  name="logout" class="user-button">Logout</button>
        </form>

</body>
</html>