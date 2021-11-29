<?php

include_once 'db_config.php';


$email = $_POST['login_email'];
$password = $_POST['login_pass'];


echo $num."  ".$name."  ".$style."  ".$year."<br>";
$sql = "select * from reg where email = '$email' and password = '$password';";


$result = mysqli_query($conn, $sql);
$result_check = mysqli_num_rows($result);


if($result_check <= 0)
{
   
}
else
{
  header("Location: ../templates/tem_home.php?signup=success");

  // while($row = mysqli_fetch_assoc($result))
  // {
  //   // echo $row['email']."  ".$row['password']."<br>";
  // }
}



?>