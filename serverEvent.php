<?php  
  
// Include db file
require_once "db.php";
// Initialize the session
session_start();

// initialize variables  
$title = $description= $start_date = $end_date= $status="";  
$id = 0;  
$edit_state = false;  
// if save button is clicked  
if (isset($_POST['save'])) {  
    $id = $_POST['id'];   
    $title = $_POST['title']; 
    $description = $_POST['description']; 
    $start_date = $_POST['start_date']; 
    $end_date = $_POST['end_date']; 
    $status =$_POST['status'];
    $created = date("Y-m-d H:i:s"); 
    $query = "INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `status`, `created`) 
    VALUES ('$id', '$title', '$description', '$start_date', '$end_date', '$status',  '$created')";  
    mysqli_query($con, $query);  
    $_SESSION['msg'] = "event saved";  
    header('location: indexEvent.php'); // redirect to index page after inserting  
}  

// update records  
if (isset($_POST['update'])) { 
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']); 
    $status = mysqli_real_escape_string($con,$_POST['status']);
    $id = mysqli_real_escape_string($con,$_POST['id']);  
    mysqli_query($con, "UPDATE `events` SET  title='$title', description='$description', start_date='$start_date', end_date='$end_date', status='$status' WHERE id=$id");  
    $_SESSION['msg'] = "event updated";  
      
}  

// delete records  
if (isset($_GET['del'])) {  
    $id = $_GET['del'];  
    mysqli_query($con, "DELETE FROM `events` WHERE id=$id");  
    $_SESSION['msg'] = "event deleted";  
    header('location: indexEvent.php');  
}  
 

// retrieve records  
$results = mysqli_query($con, "SELECT * FROM `events`");  

?>  