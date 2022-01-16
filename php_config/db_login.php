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
  $_SESSION['valid'] = 1;

  header("Location: ../templates/tem_home.php?signup=success");
  
}

// echo $num."  ".$name."  ".$style."  ".$year."<br>";
$sql = "select * from reg where email = '$email' and password = '$password';";
$sql2 = "select * from teacher_info where teacher_email = '$email' and password = '$password';";

$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
$row_data = mysqli_fetch_assoc($result);


$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_num_rows($result2);
$row_data = mysqli_fetch_assoc($result2);


if($row >= 1)
{
  $result = mysqli_query($conn, $sql);
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
$student_id = $row_data['student_id'];

$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
$_SESSION['department'] = $department;
$_SESSION['section'] = $section;
$_SESSION['blood_group'] = $blood_grop;
$_SESSION['address'] = $address;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['position'] = $position;
$_SESSION['student_id'] = $student_id;

$_SESSION['valid'] = 1;
echo "SUCCESS22222<br>";
echo $sql;


header("Location: ../templates/tem_home.php?signup=success");

}
else if($row2 >= 1)
{
  $result = mysqli_query($conn, $sql2);
$row_data = mysqli_fetch_assoc($result);

$teacher_id = $row_data['teacher_id'];
$teacher_name = $row_data['teacher_name'];
$teacher_phone = $row_data['teacher_phone'];
$teacher_dept = $row_data['teacher_dept'];
$teacher_email = $row_data['teacher_email'];
$teacher_password = $row_data['password'];


$_SESSION['teacher_id']       = $teacher_id;
$_SESSION['teacher_name']     = $teacher_name;
$_SESSION['teacher_phone']    = $teacher_phone;
$_SESSION['teacher_dept']     = $teacher_dept;
$_SESSION['teacher_email']    = $teacher_email;
$_SESSION['teacher_password'] = $teacher_password;

$_SESSION['position'] = "teacher";
$_SESSION['valid'] = 1;


// echo "SUCCESS";



header("Location: ../templates/tem_home.php?signup=success");

}
else{
  echo "NO DATA FOUND";
}







?>