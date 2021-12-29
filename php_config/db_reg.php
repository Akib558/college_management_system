<?php




if(isset($_POST['REGISTER'])){
  include_once 'db_config.php';
  $fname = $_POST['reg_f_name'];
  $lname = $_POST['reg_l_name'];
  $department = $_POST['department'];
  $section = $_POST['section'];
  $blood_group = $_POST['blood_group'];
  $address = $_POST['address'];
  $email = $_POST['reg_email'];
  $password = $_POST['reg_pass'];

  if(empty($fname) ||empty($lname) ||
    empty($department) ||empty($section) ||
    empty($blood_group) ||empty($address) ||
    empty($email) || empty($password))
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
      $sql = "insert into reg(fname, lname, department, section, blood_group, address, email, password) values ('$fname', '$lname', '$department', '$section', '$blood_group','$address', '$email', '$password');";


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