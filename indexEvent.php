<?php 
  error_reporting(0);
  require('db.php');
  include('serverEvent.php'); 
  // fetch the record to be updated  
  if (isset($_GET['edit'])) {  
    $id = $_GET['edit'];  
    $edit_state = true;  
    $rec = mysqli_query($con, "SELECT * FROM `events` WHERE id=$id");  
    $record = mysqli_fetch_array($rec); 
    $id = $record['id'];   
    $title = $record['title']; 
    $description = $record['description']; 
    $start_date = $record['start_date']; 
    $end_date = $record['end_date']; 
    $status =$record['status'];
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

    <h1>Create, update, delete Events</h1>
 
    <form class='form'>
        <table>  
        <thread>  
        <tr>
            <th>ID Number</th>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th colspan="2">Action</th> 
        </tr>
        </thread>      
        </tbody>
           <?php
           $i=0;
           while ($row = mysqli_fetch_array($results)) { ?>  
            <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['title']; ?> </td>
            <td><?php echo $row['description']; ?> </td>
            <td><?php echo $row['start_date']; ?> </td>
            <td><?php echo $row['end_date']; ?> </td>
            <td><?php echo $row['status']; ?> </td>
            <td><a class="edit_btn" href="indexEvent.php?edit=<?php echo $row['id']; ?>">Edit</a></td> 
            <td><a class="del_btn" href="indexEvent.php?del=<?php echo $row['id']; ?>">Delete</a></td>   
            <tr>
           <?php $i++; } ?>  
          </tbody>
              
        </table> 
    </form> 
    <form class=form  method="post" action="indexEvent.php">  
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <?php if ($edit_state == false): ?>  
        <label>id</label>  
        <div class="form-group">  
            <input type="text" class="login-input" name="id" value="<?php echo $id; ?>">  
        </div>  
    <?php endif ?>
    <label>title</label>  
    <div class="form-group">  
        <input type="text" class="login-input" name="title" value="<?php echo $title; ?>">  
    </div>
    <label>description</label>    
    <div class="form-group">  
        <input type="text" class="login-input" name="description" value="<?php echo $description; ?>">  
    </div>  
    <label>start_date</label>  
    <div class="form-group">  
        <input type="text" class="login-input" name="start_date" value="<?php echo $start_date; ?>">  
    </div>  
    <label>end_date</label>  
    <div class="form-group">  
        <input type="text" class="login-input" name="end_date" value="<?php echo $end_date; ?>">  
    </div> 
    <label>status</label>   
    <div class="form-group"> 
        <input type="text" class="login-input" name="status" value="<?php echo $status; ?>">  
    </div>  

    <div class="form-group">  
    <?php if ($edit_state == false): ?>  
        <button type="submit" name="save" class="login-button">Save</button>  
    <?php else: ?>  
        <button type="submit" name="update" class="login-button">Update</button>  
    <?php endif ?> 
    <p><a href="logout.php">Logout</a></p>   
    <p><a href="userDashboard.php">userDashboard</a></p>  
    </div>  
    </form>  
</body>  
</html> 