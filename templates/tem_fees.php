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
    <title>Fees</title>
    <style>
<?php include '../styles/edit_profile.css'; ?>
<?php include '../styles/course.css';?>


.main_table{
  border-color: red;
}

tr{
  background-color: #fff;
}

.table_head{

  font-weight: bold;
  font-size: large;

}


</style>
</head>
<body>
    
<div class="sidebar">
  <a href="tem_home.php">Main Menu</a>
  <a href="tem_profile.php">Home</a>
  <a href="tem_edit_profile.php">Edit Profile</a>
  <a href="tem_courses.php">Courses</a>
  <a href="tem_education.php">Educational Records</a>
  <a class="active" href="tem_fees.php">Fees</a>
 
</div>

<div class="content">


<table class="main_table">


  <tr class="table_head">
    <td>Month</td>
    <td>Fee</td>
    <td>Dues</td>
  </tr>

  <?php
  session_start();
  $db_servername = "localhost";
  $db_username = "user2";
  $db_password = "passuser2";
  $db_name = "db1";
  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

  $email = $_SESSION['email'];

  $sql = "select * from fee where student_email='$email'";
  $sql2 = "select * from dues where student_email='$email'";


  if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2))
  {
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

    $sql = "show columns from fee"; // desc fee;
    $result = mysqli_query($conn, $sql);




    if(mysqli_query($conn,$sql))
    {


        $dues_total = 0;

        while($row3 = mysqli_fetch_assoc($result))
        {
            if($row3['Field'] != 'student_email')
            {
              $month = $row3['Field'];
              $fee = $row[$month];
              $dues = $row[$month]-$row2[$month];
              $dues_total += $dues;
              echo "<tr>
                      <td>$month</td>
                      <td>$fee</td>
                      <td>$dues</td>

                    </tr>";
            }

            
        }
        echo "<tr>
                    <td></td>
                    <td></td>
                    <td>Total Dues : $dues_total</td>
                  </tr>";
    }
    else{
      echo "error_inner_if"."   ".mysqli_error($conn);
    }

    
    
  }
  else
  {
    echo 'error'."  ".mysqli_error($conn);
  }


?>


</table>



</div>


</body>
</html>