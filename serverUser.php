<?php  
  
// Include db file
require_once "db.php";
// Initialize the session
session_start();

// initialize variables  
$first_name = $last_name= $phone = $email= $address =  $password="";  
$id = 0;  
$edit_state = false;  
// if save button is clicked  
if (isset($_POST['save'])) {  
    $id =  $_POST["id"];
    $password =  $_POST["password"];
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $phone = $_POST['phone']; 
    $email =$_POST['email'];
    $address = $_POST['address']; 
    $create_datetime = date("Y-m-d H:i:s"); 
    $query = "INSERT INTO `users` (`id`, `password`, `first_name`, `last_name`, `phone`, `email`, `address`, `create_datetime`) 
    VALUES ('$id', '" . md5($password) . "', '$first_name', '$last_name', '$phone', '$email', '$address',  '$create_datetime')";  
    mysqli_query($con, $query);  
    $_SESSION['msg'] = "user saved";  
    header('location: indexSearch.php'); // redirect to index page after inserting  
}  

// update records  
if (isset($_POST['update'])) { 
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']); 
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $id = mysqli_real_escape_string($con,$_POST['id']);  
    mysqli_query($con, "UPDATE `users` SET password = '" . md5($password) . "', first_name='$first_name', last_name='$last_name',
    phone='$phone', email='$email', address='$address' WHERE id=$id");  
    $_SESSION['msg'] = "user updated";  
      
}  

// delete records  
if (isset($_GET['del'])) {  
    $id = $_GET['del'];  
    mysqli_query($con, "DELETE FROM `users` WHERE id=$id");  
    $_SESSION['msg'] = "user deleted";  
    header('location: indexSearch.php');  
}  
 

// retrieve records  
$results = mysqli_query($con, "SELECT * FROM `users`");  

?>  