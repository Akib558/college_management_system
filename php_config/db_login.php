<?php
session_start();
include_once 'db_config.php';


$email = $_POST['login_email'];
$password = $_POST['login_pass'];

if($email == 'admin@gmail.com' && $password == 'noadmin')
{
  $_SESSION['email'] = "admin@gmail.com";
  $_SESSION['fname'] = "admin";
  $position = "admin";
  $_SESSION['position'] = $position;
  header("Location: ../templates/tem_home.php?signup=success");
  
}

// echo $num."  ".$name."  ".$style."  ".$year."<br>";
$sql = "select * from reg where email = '$email' and password = '$password';";


$result = mysqli_query($conn, $sql);
$result_check = mysqli_num_rows($result);
$row_data = mysqli_fetch_assoc($result);

$fname = $row_data['fname'];
$lname = $row_data['lname'];
$department = $row_data['department'];
$section = $row_data['section'];
$blood_grop = $row_data['blood_group'];
$address = $row_data['address'];
$email = $row_data['email'];
$password = $row_data['password'];
$position = $row_data['position'];


if($result_check <= 0)
{
   echo "DATA NOT FOUND";
}
else
{
  echo $email;

  $_SESSION['fname'] = $fname;
  $_SESSION['lname'] = $lname;
  $_SESSION['department'] = $department;
  $_SESSION['section'] = $section;
  $_SESSION['blood_group'] = $blood_grop;
  $_SESSION['address'] = $address;
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['position'] = $position;
  
  header("Location: ../templates/tem_home.php?signup=success");
  // if($position == 'student')
  // {
  // }
  // else if($position == 'teacher')
  // {
  //   header("Location: ../templates/tem_home.php?signup=success");
  // }
  // else if($position == 'admin')
  // {
    
  // }
  // while($row = mysqli_fetch_assoc($result))
  // {
  //   // echo $row['email']."  ".$row['password']."<br>";
  // }
}



?>