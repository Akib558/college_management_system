<?php

session_start();






if(isset($_POST['REGISTER']))
{
  $db_servername = "localhost";
  $db_username = "user2";
  $db_password = "passuser2";
  $db_name = "db1";
  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);



  $sql = "show columns from education_cse";
  $course_name = array();

  if(mysqli_query($conn, $sql))
  {
    $result = mysqli_query($conn, $sql);
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
          array_push($course_name,$row['Field']);
     
    }
  }
  else{
    echo "ERROR1 : ".mysqli_error($conn);
  }

  $post_value = array();

  for($i = 0; $i < count($course_name); $i++)
  {
      array_push($post_value,$_POST[$course_name[$i]]);
  }

  
$email    = $_SESSION['db_admin_edu_email'];
$year     = $_SESSION['db_admin_edu_year'] ;
$semester = $_SESSION['db_admin_edu_semester'];
$session  = $_SESSION['db_admin_edu_session'];



// $sql = "delete from education_cse where email='$email'and year='$year' and semester='$semester' and session='$session'";
$sql = "delete from education_cse where student_email='$email' and year='$year' and semester='$semester' and session='$session';";

// echo $sql;


if(mysqli_query($conn,$sql))
{
    $sql= "insert into education_cse( ";
    for($i = 0; $i < count($course_name)-1; $i++)
    {
        $sql = $sql.$course_name[$i].',';
    }
    $sql = $sql.$course_name[count($course_name)-1].") values (";

    for($i = 0; $i < count($post_value)-1; $i++)
    {
        $sql = $sql."'".$post_value[$i]."',";
    }

    $sql = $sql."'".$post_value[count($post_value)-1]."');";

    if(mysqli_query($conn,$sql))
    {
        echo "SUCCESS";
        header("Location: ../templates/tem_admin_edu.php");
        
    }
    else{
        echo "ERROR2 : ".mysqli_error($conn)."<br>".$sql;
    }

    


}
else{
    echo "ERROR3 : ".mysqli_error($conn);
}






}
















?>