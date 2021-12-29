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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Information</title>
    <style>
<?php include '../styles/edit_profile.css'; ?>
</style>
</head>
<body>



<div class="sidebar">
  <a href="tem_home.php">Main Menu</a>
  <a href="tem_profile.php">Home</a>
  <a href="tem_edit_profile.php">Edit Profile</a>
  <a href="tem_courses.php">Courses</a>
  <a class="active" href="tem_education.php">Educational Records</a>
  <a href="tem_fees.php">Fees</a>
 
</div>

<div class="content">

<p>Education</p>

</div>

</body>
</html>
