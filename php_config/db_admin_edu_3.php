<?php

session_start();






if(isset($_POST['REGISTER']))
{
  $db_servername = "localhost";
  $db_username = "user2";
  $db_password = "passuser2";
  $db_name = "db1";
  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

  $dept = $_POST['department']; 




    if($dept == "CSE")
    {


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
    else if($dept == "EEE")
    {
        $sql = "show columns from education_eee";
        $course_name = array();
        // $course_name2 = array();
      
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
      
        
        $sql= "insert into education_eee( ";
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
        
        // echo $sql;

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
        echo "<p style='color:red;'><b>$dept Department Is not Avaliable</b></p>";
    }




}
else{
    echo "ERROR3 : ".mysqli_error($conn);
}




?>