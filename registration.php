<!DOCTYPE html>  
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<?php

// Include db file
require_once "db.php";
// Processing form data when form is submitted
if (isset($_POST['signup'])) {
    // Set parameters
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']); 
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $create_datetime = date("Y-m-d H:i:s");

    // Define variables and initialize with empty values
    $id_error =  $password_error = $mobile_error = $last_name_error = $first_name_error =  $email_error = $address_error = "";

    // Validate parameters
    if(strlen($id) == 9 and !preg_match("/^[0-9]*$/",$id)) {
        $id_error = "Your id number must be 9 characters and contain only numeric value";
    }
    
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_error = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
        $first_name_error = "First_name must contain only alphabets and space";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
        $last_name_error = "Last_name must contain only alphabets and space";
    }

    if(strlen($phone) == 10 and !preg_match("/^[0-9]*$/",$phone)) {
        $mobile_error = "Phone number must be 10 characters and contain only numeric value";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    
    if (!preg_match( '/[A-Za-z0-9\-\\,.]+/',$address)) {
        $address_error = "Address must contain alphabets and digits";
    }
    
    // Check input errors before inserting in database
    if ($id_error == "" && $password_error == ""  && $mobile_error == "" && $last_name_error == "" && $first_name_error == "" && $email_error == "" && $address_error == "") {
        
        // Prepare an insert statement
        $query    = "INSERT INTO `users` (`id`, `password`, `first_name`, `last_name`, `phone`, `email`, `address`, `create_datetime`)
                    VALUES ('$id', '" . md5($password) . "', '$first_name', '$last_name', '$phone', '$email', '$address', '$create_datetime')";

        $result   = mysqli_query($con, $query);
        if($result) {
            // Redirect to login page
            echo "<div class='form'>
            <h3>You are registered successfully.</h3><br/>
            <p class='link'>Click here to <a href='login.php'>Login</a></p>
            </div>";
        } else {
                echo "Error: " . $sql . "" . mysqli_error($con);
               /* echo "<div class='form'>
                <h3>Required fields are missing.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                </div>";*/
        }
    }
    // Close connection
    mysqli_close($con);
} else {
?>
<!DOCTYPE html>
    <body>
        <div class="container">
        <div class="row">
        <div class="col-lg-8 col-offset-2">

        <form class= form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Registration</h1>
        <p>Please fill all fields in the form</p>
        <div class="form-group">
        <input type="text" class="login-input" name="id" placeholder="ID Number" value="" required="">
        <span class="text-danger"><?php if (isset($id_error)) echo $id_error; ?></span>
        </div>

        <div class="form-group">
        <input type="password" class="login-input" name="password" placeholder="Password" value="" required="">
        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
        </div>  

        <div class="form-group">
        <input type="text" class="login-input" name="first_name" placeholder="First Name" value=""  required="">
        <span class="text-danger"><?php if (isset($first_name_error)) echo $first_name_error; ?></span>
        </div>

        <div class="form-group">
        <input type="text" class="login-input" name="last_name" placeholder="Last Name" value="" required="">
        <span class="text-danger"><?php if (isset($last_name_error)) echo $last_name_error; ?></span>
        </div>

        <div class="form-group">
        <input type="text" class="login-input" name="phone" placeholder="Phone" value="" required="">
        <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
        </div>

        <div class="form-group ">
        <input type="text" class="login-input" name="email" placeholder="Email" value=""  required="">
        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
        </div>

        <div class="form-group">
        <input type="text" class="login-input" name="address" placeholder="Address" value=""  required="">
        <span class="text-danger"><?php if (isset($address_error)) echo $address_error; ?></span>
        </div>  
        <input type="submit" name="signup" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>


        </form>
        </div>
        </div>    
        </div>
    </body>
<?php
    }
?>
</html>