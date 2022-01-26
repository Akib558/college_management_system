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

      $sql = "SELECT student_id FROM reg ORDER BY student_id DESC LIMIT 1;";

      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $ss = $row['student_id'];
      $gg = str_replace("student","",$ss);
      $gg = "student".(string)((int)$gg+1);

      $sql = "insert into reg(fname, lname, department, section, blood_group, address, email, password, position, student_id ) values ('$fname', '$lname', '$department', '$section', '$blood_group','$address', '$email', '$password', 'student', '$gg');";

      // echo $gg;
      // echo $sql;

      if (mysqli_query($conn, $sql)) {
        $sql = "insert into fee (student_email) values ('$email');";
        mysqli_query($conn,$sql);
        $sql = "insert into dues (student_email) values ('$email');";
        mysqli_query($conn,$sql);
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



?>