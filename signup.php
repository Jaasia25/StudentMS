<?php
require_once('config.php');


if(isset($_POST["sid"])){

    //echo "hi";
    $sid = $_POST['sid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dof = $_POST['dof'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `student_info`(`sid`,`fname`,`lname`,`dof`,`password`) VALUES('$sid','$fname','$lname','$dof','$password')";

    if ($conn->query($sql) === TRUE ) 
    {
        echo "<script>alert('User Submitted Successfully');</script>";

    }
    else
    {
        echo "<script>alert('Validation Failed');</script>";
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


<div class="signup">
    <div class="content">
        <div class="container">
            <h1>Sign up</h1>
            <form action="" method="post">
                <label for="sid2">Student ID:</label><br>
                <input type="text" id="sid" name="sid"><br>
                <label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname"><br>
                <label for="lname">Last name:</label><br>
                <input type="text" id="lname" name="lname"><br>
                <label for="dof">Date of Birth:</label><br>
                <input type="date" id="dof" name="dof"><br>
                <label for="password">Password:</label><br>
                <input type="text" id="password" name="password">
                <br>
                <button>
                    <input type="submit" id="submit" name="submit">
                </button>
            </form>
        </div>
    </div>

</div>

    
</body>
</html>