<?php




if(isset($_POST['REGISTER'])){
  include_once 'db_config.php';
  $name = $_POST['reg_name'];
  $email = $_POST['reg_email'];
  $password = $_POST['reg_pass'];

  if(empty($name) || empty($email) || empty($password))
  {
    header("Location: ../templates/tem_reg.php?signup=empty");
  } 
  else
  {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../templates/tem_reg.php?signup=invalidemail");
    }
    else
    {
      $sql = "insert into reg(name, email, password) values ('$name', '$email', '$password');";


      if (mysqli_query($conn, $sql)) {
          header("Location: ../templates/tem_reg.php?signup=success");
      //   echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }

  //echo $name.' '.$email.' '.$password."<br>";
  

  }
}
else{
  header("Location: ../templates/tem_reg.php?signup=error");
}




// $sql2 = "select * from reg";
// $result = mysqli_query($conn, $sql2);
// $result_check = mysqli_num_rows($result);



// if($result_check > 0)
// {
//   while($row = mysqli_fetch_assoc($result))
//   {
//     echo $row['name']."  ".$row['email'].' '.$row['password']."<br>";
//   }
// }
// else
// {
//   header("Location: ../templates/tem_reg.php?signup=success");

//   // echo "unsccess";
// }



?>