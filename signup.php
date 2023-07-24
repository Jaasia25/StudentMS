<?php
require_once('config.php');


if(isset($_POST["sid"])){

    //echo "hi";
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $dof = $_POST['dof'];
    $password = $_POST['password'];
    $semester = $_POST['semester'];
    // $photo = $_POST['photo'];

    $sql = "INSERT INTO `student_info`(`sid`,`name`,`phone`,`dof`,`password`,`semester`,`photo`) VALUES('$sid','$name','$phone','$dof','$password','$semester','')";

    if ($conn->query($sql) === TRUE ) 
    {
        echo "<script>alert('Registration Successful');</script>";

    }
    else
    {
        echo "<script>alert('Registration Failed');</script>";
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
            <h1>Sign Up</h1>
            </div>
            <hr class="mb-1">
            <div class="row">
            <form action="" method="post">
                <div class="md-6">
                    <label for="sid2">Student ID:</label>
                    <input class="form-control" type="text" id="sid" name="sid">
                </div>
                <div class="md-6">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="md-6">
                    <label for="phone">Phone Number:</label>
                    <input class="form-control" type="text" id="phone" name="phone">
                </div>
                <div class="md-6">
                    <label for="dof">Date of Birth:</label>
                    <input class="form-control" type="date" id="dof" name="dof">
                </div>
                <div class="md-6">
                    <label for="password">Password:</label>
                    <input class="form-control" type="text" id="password" name="password">
                </div>
                <div class="md-6">
                    <label for="semester">Semester:</label>
                    <select class="form-control" name="semester" id="semester">
                    <option value="1.1">1.1</option>
                    <option value="1.2">1.2</option>
                    <option value="2.1">2.1</option>
                    <option value="2.2">2.2</option>
                    <option value="3.1">3.1</option>
                    <option value="3.2">3.2</option>
                    <option value="4.1">4.1</option>
                    <option value="4.2">4.2</option>
                    </select>
                </div>
                <br>
                <button class="btn">Submit</button>
                </button>
            </form>
        </div>
        </center>
    </div>

</div>

    
</body>
</html>


<!-- <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">
<input class="form-control" type="text" placeholder="Default input" aria-label="default input example">
<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example"> -->