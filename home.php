<?php
session_start();
require_once('config.php');

$sid = $_SESSION['valid'];

if(!isset($sid)){
    header('location:signin.php');
};

if(isset($_GET['logout'])){
    unset($sid);
    session_destroy();
    header('location:signin.php');
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


<div class="home_profile">

    <img src="image/menu-icon.png" class="menu" onclick="toggleMenu()">

    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <a href="#" class="sub-menu-link">
                <p>My Courses</p>
                <span>></span>
            </a>
            <hr>
            <a href="#" class="sub-menu-link">
                <p>Check Result</p>
                <span>></span>
            </a>
            <hr>
            <a href="#" class="sub-menu-link">
                <p>Carry</p>
                <span>></span>
            </a>
        </div>
    </div>    

    <div class="container">
        <center>
        <div class="profile">
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

            <h3><?php echo $fetch['name']; ?></h3>
            <h4><?php echo "Student ID: ".$fetch['sid']."<br>"; 
                      echo "Contact Number: ".$fetch['phone']."<br>";
                      echo "Date of Birth: ".$fetch['dof']."<br>";
                      echo "Semester: ".$fetch['semester']."<br>"; ?>
            </h4>

            <a href="updateProfile.php">
                <button class="btn">Update Profile</button>
            </a>
            <a href="home.php?logout=<?php echo $sid; ?>">
                    <button class="btn">Sign Out</button>
            </a>
        </div>
        </center>
    </div>
</div>


<script>
    let subMenu= document.getElementById("subMenu");

    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }

</script>

</body>
</html>