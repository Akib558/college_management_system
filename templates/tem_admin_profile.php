<?php
    session_start();

  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $department = $_SESSION['department'];
  $section = $_SESSION['section'];
  $blood_grop = $_SESSION['blood_group'];
  $address = $_SESSION['address'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
  
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher_admin</title>
<style>
    <?php include '../styles/edit_profile.css';
    ?><?php include '../styles/course.css';
    ?>
    </style>
</head>
<body>

<div class="sidebar">
  <a href="tem_home.php">Home</a>
  <a class="active" href="tem_admin_teacher.php">Teacher</a>
  <a href="tem_admin_student.php">Student</a>
  <a href="tem_admin_notice.php">Notice Board</a>
  <a href="tem_admin_edu.php">Educational Records</a>
  <a href="tem_admin_fee.php">Fees</a>
 
</div>

<div class="content">
    
<div id="navbar">
            <a href="tem_courses.php">Enrolled Courses</a>
            <a href="tem_courses_2.php">Edit Courese</a>
            <a href="tem_courses_3.php">All Courses</a>
        </div>
    <p> ITS ADMIN</p>
   
</div>

</body>
</html>

