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
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['dateof'] = $row['dof'];
        $_SESSION['pass'] = $row['password'];
        $_SESSION['sem'] = $row['semester'];
        header('location:home.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/1344c17b50.js"></script>


</head>
<body>


<div class="sign">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="./image/aust.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        AUST | SMS
        </a>
        <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav justify-content-end">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="signin.php">Login</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <center>
        <div class="main-text">
            <h1>Sign In</h1>
        </div>
        <hr class="mb-1">
        <br>
        <!-- <div class="row"> -->
            <form action="" method="post">
                <div class="md-6">
                    <label for="user">User ID:</label>
                    <input type="text" class="form-control" id="sid" name="sid">
                </div>   
                <div class="md-6">
                    <label for="password">Password:</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <br>
                <button class="btn" type="submit" id="submit" name="submit">Sign In</button>
                        <!-- <input type="submit" id="submit" name="submit"> -->    
                <br>
                <hr class="mb-1">
                <br>
                
            </form>

            <div>Don't Have an Account? 
                <a href="signup.php">
                    <button class="btn">Sign Up</button>
                </a>
            </div>
        
        <!-- </div> -->

        </center>
    </div>
</div>

    
</body>
</html>