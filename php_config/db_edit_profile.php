<?php

session_start();


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
    header("Location: ../templates/tem_edit_profile.php?signup=empty");
  } 
  else
  {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../templates/tem_reg.php?signup=invalidemail");
    }
    else
    {
    //   $sql = "insert into reg(fname, lname, department, section, blood_group, address, email, password) values ('$fname', '$lname', '$department', '$section', '$blood_group','$address', '$email', '$password');";

    echo $department;

      $sql = "update reg set fname='$fname', lname='$lname', department='$department', section='$section', blood_group='$blood_group', address='$address' where email='$email' and password='$password';";

      if (mysqli_query($conn, $sql)) {
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


        header("Location: ../templates/tem_profile.php?signup=success");

        // while($row = mysqli_fetch_assoc($result))
        // {
        //   // echo $row['email']."  ".$row['password']."<br>";
        // }
        }


          header("Location: ../templates/tem_profile.php?signup=success");
      //   echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }


      



    
    }

  
  }
}
else{
  header("Location: ../templates/tem_reg.php?signup=error");
}


?>