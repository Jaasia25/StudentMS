<?php
session_start();
require_once('config.php');

$sid = $_SESSION['valid'];

if(isset($_POST['update_profile'])){

    $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);

    mysqli_query($conn, "UPDATE `student_info` SET phone = '$update_phone' WHERE sid = '$sid'") or die('query failed');

    $old_password = $_POST['old_password'];
    $update_password = mysqli_real_escape_string($conn, md5($_POST['update_password']));
    $new_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

    if(!empty($update_password)||!empty($new_password)||!empty($confirm_password)){
        if($update_password!=$old_password){
            echo "<script>alert('Incorrect Old Password');</script>";
        }elseif($new_password!=$confirm_password){
            echo "<script>alert('Passwords do not match');</script>";
        }
        else{
            mysqli_query($conn, "UPDATE `student_info` SET password = '$confirm_password' WHERE sid = '$sid'") or die('query failed');
            echo "<script>alert('Profile Successfully Updated');</script>";
        }
    }
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


<div class="update_profile">
    <div class="container">
        <center>
        <?php
            $select = mysqli_query($conn,"SELECT * FROM `student_info` WHERE sid = '$sid'")
            or die('query failed');

            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select); 
            }
            if($fetch['photo']==''){
                echo '<img src="image/user.png">';
            }
        ?>

        <form action="" method="post">                
            <div class="md-6">
                <label>Phone Number:</label>
                <input class="form-control" type="text" name="update_phone" value="<?php echo $fetch['phone']?>">
            </div>
            <div class="md-6">
                <input class="form-control" type="hidden" name="old_password" value="<?php echo $fetch['password']?>">
                <label>Old Password:</label>
                <input class="form-control" type="password" name="update_password">

            </div>
            <div class="md-6">
                <label>New Password:</label>
                <input class="form-control" type="password" name="new_password">
            </div>
            <div class="md-6">
                <label>Confirm Password:</label>
                <input class="form-control" type="password" id="password" name="confirm_password">
            </div>
            <br>
            <button class="btn" value= "update profile" name="update_profile">Update Profile</button>
            </button>
            
        </form>
        <br>
        <a href="home.php">
            <button class="btn">Go Back</button>
        </a>
        </center>
    </div>
</div>


</body>
</html>