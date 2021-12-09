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

$name = $row_data['name'];

if($result_check <= 0)
{
   echo "DATA NOT FOUND";
}
else
{
  echo $email;

  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['name'] = $name;

  header("Location: ../templates/tem_home.php?signup=success");

  // while($row = mysqli_fetch_assoc($result))
  // {
  //   // echo $row['email']."  ".$row['password']."<br>";
  // }
}



?>