<?php

session_start();






if(isset($_POST['REGISTER']))
{
  $db_servername = "localhost";
  $db_username = "user2";
  $db_password = "passuser2";
  $db_name = "db1";
  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);



  $sql = "show columns from fee";
  $course_name = array();
  $email = $_SESSION['fee_email'];

  if(mysqli_query($conn, $sql))
  {
    $result = mysqli_query($conn, $sql);
    $i = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['Field'] != 'student_email')
        {
            array_push($course_name,$row['Field']);
        }
     
    }
  }
  else{
    echo "ERROR1 : ".mysqli_error($conn);
  }

  $post_value = array();

  array_push($post_value,$email);

  for($i = 0; $i < count($course_name); $i++)
  {
      array_push($post_value,$_POST[$course_name[$i]]);
  }

  $post_value2 = array();
  array_push($post_value2,$email);


  for($i = 0; $i < count($course_name); $i++)
  {
      $tt = $course_name[$i]."1";
      array_push($post_value2,$_POST[$tt]);
  }


  
$email    = $_SESSION['fee_email'];



// $sql = "delete from education_cse where email='$email'and year='$year' and semester='$semester' and session='$session'";


$sql = "delete from fee where student_email='$email';";
$sql2 = "delete from dues where student_email='$email';";




if(!mysqli_query($conn,$sql))
{
    echo "ERROR1".mysqli_error($conn);
}

if(!mysqli_query($conn,$sql2))
{
    echo "ERROR2".mysqli_error($conn);

}


// echo $sql;






$sql= "insert into fee( student_email, ";
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

echo $sql."<br>";

    if(!mysqli_query($conn,$sql))
    {
        echo "ERROR3".mysqli_error($conn);
    
    }


$sql= "insert into dues( student_email, ";
    for($i = 0; $i < count($course_name)-1; $i++)
    {
        $sql = $sql.$course_name[$i].',';
    }
    $sql = $sql.$course_name[count($course_name)-1].") values (";

    for($i = 0; $i < count($post_value2)-1; $i++)
    {
        $sql = $sql."'".$post_value2[$i]."',";
    }

    $sql = $sql."'".$post_value2[count($post_value2)-1]."');";


    if(!mysqli_query($conn,$sql))
    {
    echo "ERROR4".mysqli_error($conn);

    }


    echo $sql."<br>";












// if(mysqli_query($conn,$sql))
// {
//     $sql= "insert into fee( student_email ";
//     for($i = 0; $i < count($course_name)-1; $i++)
//     {
//         $sql = $sql.$course_name[$i].',';
//     }
//     $sql = $sql.$course_name[count($course_name)-1].") values (";

//     for($i = 0; $i < count($post_value)-1; $i++)
//     {
//         $sql = $sql."'".$post_value[$i]."',";
//     }

//     $sql = $sql."'".$post_value[count($post_value)-1]."');";

//     if(mysqli_query($conn,$sql))
//     {
//         echo "SUCCESS";
//         header("Location: ../templates/tem_admin_edu.php");
        
//     }
//     else{
//         echo "ERROR2 : ".mysqli_error($conn)."<br>".$sql;
//     }

    


// }
// else{
//     echo "ERROR3 : ".mysqli_error($conn);
// }






}
















?>