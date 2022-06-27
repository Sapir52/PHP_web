<?php 
  error_reporting(0);
  require('db.php');
  include('serverUser.php'); 
  // fetch the record to be updated  
  if (isset($_GET['edit'])) {  
    $id = $_GET['edit'];  
    $edit_state = true;  
    $rec = mysqli_query($con, "SELECT * FROM `users` WHERE id=$id");  
    $record = mysqli_fetch_array($rec); 

    $id = $record['id'];   
    $password = $record['password']; 
    $first_name = $record['first_name']; 
    $last_name = $record['last_name']; 
    $phone = $record['phone']; 
    $email =$record['email'];
    $address = $record['address']; 
    }

?>  

<html>  
<head> 
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>  
<body>  
    <h1>Update user</h1>
 
    <form class=form  method="post" action="indexUser.php">  
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <label>password</label>  
    <div class="form-group">  
        <input type="password" class="login-input" name="password" value="<?php echo $password; ?>">  
    </div>
    <label>first_name</label>    
    <div class="form-group">  
        <input type="text" class="login-input" name="first_name" value="<?php echo $first_name; ?>">  
    </div>  
    <label>last_name</label>  
    <div class="form-group">  
        <input type="text" class="login-input" name="last_name" value="<?php echo $last_name; ?>">  
    </div>  
    <label>phone</label>  
    <div class="form-group">  
        <input type="text" class="login-input" name="phone" value="<?php echo $phone; ?>">  
    </div> 
    <label>email</label>   
    <div class="form-group"> 
        <input type="text" class="login-input" name="email" value="<?php echo $email; ?>">  
    </div>  
    <label>address</label>
    <div class="form-group">    
        <input typr="type" class="login-input" name="address" value="<?php echo $address; ?>">  
    </div>  

    <div class="form-group">  
    <?php if ($edit_state == true): ?>  
        <button type="submit" name="update" class="login-button">Update</button>   
    <?php endif ?>
    <p><a href="userDashboard.php">userDashboard</a></p>  
    <p><a href="logout.php">Logout</a></p> 
    

    </div>  
    </form>  
</body>  
</html> 