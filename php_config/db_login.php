<?php
session_start();
include_once 'db_config.php';


$email = $_POST['login_email'];
$password = $_POST['login_pass'];


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


  header("Location: ../templates/tem_home.php?signup=success");

  // while($row = mysqli_fetch_assoc($result))
  // {
  //   // echo $row['email']."  ".$row['password']."<br>";
  // }
}



?>