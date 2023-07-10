<?php
session_start();
require_once('config.php');


if(isset($_POST['submit'])){

    $myusername = mysqli_real_escape_string($conn,$_POST['sid']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM `student_info` WHERE sid = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql) or die("SELECT Error");
    $row = mysqli_fetch_assoc($result);


    if(is_array($row) && !empty($row)) {

        $_SESSION['valid'] = $row['sid'];
        $_SESSION['firstname'] = $row['fname'];
        $_SESSION['lastname'] = $row['lname'];
        $_SESSION['dateof'] = $row['dof'];
        $_SESSION['pass'] = $row['password'];
        
     }
    else
    {
        echo "<script>alert('Login Failed');</script>";
    }
    if(isset($row['sid']))
    {
        if($row['sid']== $myusername && $row['password']== $mypassword){
            echo "<script>alert('Login Successful');</script>";
        }
    }
    
}
else{
    //echo "bhai";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <link rel="stylesheet" href="style.css">


</head>
<body>


<div class="signin">
    <div class="content">
        <div class="container">
            <h1>Sign In</h1>
            <br>
            <form action="" method="post">
                <label for="user">User ID:</label><br>
                <input type="text" id="sid" name="sid"><br>
                
                <label for="password">Password:</label><br>
                <input type="text" id="password" name="password">
                <br>
                <button>
                    <input type="submit" id="submit" name="submit">
                </button>
                <br>
                Don't Have and Account? <a href="signup.php">Sign Up</a>
            </form>
            
            
        </div>

    </div>

</div>

    
</body>
</html>