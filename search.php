<?php
error_reporting(0);
require('db.php');
  if(count($_POST)>0) {
	$first_name=$_POST['first_name'];
	$result = mysqli_query($con,"SELECT * FROM `users` where first_name='$first_name' ");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Retrive data</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
<form class='form'>
	<h1>Search user</h1>
	<table>
	<tr>
            <th>ID Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th colspan="2">Action</th> 
    </tr>
	<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
	?>
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
		<?php
			$i++;
		}
	?>
	</table>
	<p><a href="logout.php">Logout</a></p>
</form>

</body>
</html>