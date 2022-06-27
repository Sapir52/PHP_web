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
    <?php if(isset($_SESSION['msg'])): ?>  
        <div class= "msg">  
            <?php  
            echo $_SESSION['msg'];  
            unset($_SESSION['msg']);  
            ?>  
        </div>  
    <?php endif ?> 

    <h1>Create, update, delete User</h1>
 
    <form class='form'>
        <table>  
        <thread>  
        <tr>
            <th>ID Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th colspan="2">Action</th> 
        </tr>
        </thread>      
        </tbody>
           <?php
           $i=0;
           while ($row = mysqli_fetch_array($results)) { ?>  
            <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['first_name']; ?> </td>
            <td><?php echo $row['last_name']; ?> </td>
            <td><?php echo $row['phone']; ?> </td>
            <td><?php echo $row['email']; ?> </td>
            <td><?php echo $row['address']; ?> </td>
            <td><a class="edit_btn" href="indexSearch.php?edit=<?php echo $row['id']; ?>">Edit</a></td> 
            <td><a class="del_btn" href="indexSearch.php?del=<?php echo $row['id']; ?>">Delete</a></td>   
            <tr>
           <?php $i++; } ?>  
          </tbody>
              
        </table> 
    </form> 
    <form class=form  method="post" action="indexSearch.php">  
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <?php if ($edit_state == false): ?>  
        <label>id</label>  
        <div class="form-group">  
            <input type="text" class="login-input" name="id" value="<?php echo $id; ?>">  
        </div>  
    <?php endif ?>
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
    <?php if ($edit_state == false): ?>  
        <button type="submit" name="save" class="login-button">Save</button>  
    <?php else: ?>  
        <button type="submit" name="update" class="login-button">Update</button>  
    <?php endif ?> 
    <p><a href="logout.php">Logout</a></p>   
    <p><a href="adminDashboard.php">adminDashboard</a></p>  
    </div>  
    </form>  
</body>  
</html> 