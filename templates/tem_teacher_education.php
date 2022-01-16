<?php
    session_start();

  $teacher_id =   $_SESSION['teacher_id'];
  $teacher_name =   $_SESSION['teacher_name'];    
  $teacher_phone =   $_SESSION['teacher_phone'];   
  $teacher_dept =   $_SESSION['teacher_dept'] ; 
  $teacher_email =   $_SESSION['teacher_email'];   
  $teacher_password =   $_SESSION['teacher_password'];
    
    
    
    
    
    
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher_admin</title>
<style>
    <?php include '../styles/edit_profile.css';
    ?><?php include '../styles/course.css';
    ?>

  .new_content{
    /* background-color: red; */
    margin-top: 50px;
  }

  .collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content2 {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}

.demo_table{
  width: 100%;
  table-layout: fixed;
}
tr{
  text-align: center;
}

    </style>
</head>
<body>

<div class="sidebar">
<a href="tem_home.php">Main Menu</a>
  <a  href="tem_teacher_profile.php">Home</a>
  <a href="tem_teacher_edit_profile.php">Edit Profile</a>
  <a  href="tem_teacher_course.php">Courses</a>
  <a class="active" href="tem_teacher_education.php">Educational Records</a>

 
</div>

<div class="content">
<div id="navbar">

<a style="background-color: #2bff00;" href="tem_teacher_education.php">Get Info</a>
            <a href="tem_teacher_education_2.php">Update Info</a>

           
        </div>
    

    <div class="new_content">

  <?php
      session_start();

      $db_servername = "localhost";
      $db_username = "user2";
      $db_password = "passuser2";
      $db_name = "db1";

      $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

    //   $sql = "select * from teacher_info";
        $sql = "select teacher_course_name from teacher_courses where teacher_id='$teacher_id';";

    $course_name = array();
    $course_name2 = array();



    if(mysqli_query($conn,$sql))
    {

        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {   
            $dept = $row['teacher_course_name'];
            $val = substr($dept, 0, strpos($dept, "-"));
            if(strtoupper($val) == "CSE")
            {
                array_push($course_name, str_ireplace(array('-'), '_', $row['teacher_course_name']));
            }
            else{
                array_push($course_name2, str_ireplace(array('-'), '_', $row['teacher_course_name']));
            }
        }


        // for($i = 0; $i < count($course_name); $i++)
        // {
        //     echo $course_name[$i];
        // }

        // for($i = 0; $i < count($course_name2); $i++)
        // {
        //     echo $course_name2[$i];
        // }


        $sql = "show columns from education_cse";

        $column = array();

        if(mysqli_query($conn, $sql))
        {
          $result = mysqli_query($conn, $sql);
          $i = 0;
          while($row = mysqli_fetch_assoc($result))
          {
                array_push($column,$row['Field']);
                $i++;
                if($i > 5)
                {
                    break;
                }
          }
        }
        else{
          echo "ERROR1 : ".mysqli_error($conn);
        }



        $sql_cse = "select ";
        for($i = 0; $i < count($column)-1; $i++)
        {
            $sql_cse = $sql_cse.$column[$i].',';
        }

        for($i = 0; $i < count($course_name)-1; $i++)
        {
            $sql_cse = $sql_cse.$course_name[$i].",";
        }

        $sql_cse = $sql_cse.$course_name[count($course_name)-1]." from education_cse;";


        // echo "<br>".$sql_cse;

        $sql_eee = "select ";
        for($i = 0; $i < count($column)-1; $i++)
        {
            $sql_eee = $sql_eee.$column[$i].',';
        }

        for($i = 0; $i < count($course_name2)-1; $i++)
        {
            $sql_eee = $sql_eee.$course_name2[$i].",";
        }

        $sql_eee = $sql_eee.$course_name2[count($course_name2)-1]." from education_eee;";

        // echo "<br>".$sql_eee;


        if(mysqli_query($conn, $sql_cse))
        {
            $result = mysqli_query($conn, $sql_cse);
            // echo "SUCCESS";
            while($row = mysqli_fetch_assoc($result))
            {
                $student_email = $row['student_email'];
                $year = $row['year'];
                $semester = $row['semester'];
                $session = $row['session'];
                $department = $row['department'];

                

                echo "
            <button type='button' class='collapsible kk-btn'><p class='kk'>$student_email</p></button>
            <div class='content2'>
                <table class='demo_table'>
                <tr>
                  <td>Year : $year</td>
                  <td>Semester : $semester</td>
                </tr>
                <tr>
                  <td>Session : $session</td>
                  <td>Department : $department</td>
                </tr>
                <tr>";

                for($i = 0; $i < count($course_name); $i++)
                {
                    $bb = $course_name[$i];
                    $bb2 = $row[$course_name[$i]];
                    echo "
                    <tr colspan='2'>
                    <td>Subject : $bb</td>
                    <td>Grade : $bb2</td>
                  </tr>
                    ";
                }

                echo"
              </table></div>";


            }
        }
        else{
            echo "ERROR : ".mysqli_error($conn);
        }










        // $pp = str_ireplace(array('@', '.'), '_', $student_email);
        

    }
    else{
        echo "ERROR2 : ";
        echo $sql;
    }


     

    //   if(mysqli_query($conn, $sql))
    //   {
    //       $result = mysqli_query($conn, $sql);
    //       echo "SUCCESS";
    //       while($row = mysqli_fetch_assoc($result))
    //       {
    //         $teacher_id = $row['teacher_id'];
    //         $teacher_name = $row['teacher_name'];
    //         $teacher_phone = $row['teacher_phone'];
    //         $teacher_dept = $row['teacher_dept'];

    //         $sql2 = "select * from teacher_courses where teacher_id = '$teacher_id'";
    //         $course = array();

    //         $result2 = mysqli_query($conn,$sql2);
    //         while($row2 = mysqli_fetch_assoc($result2))
    //         {
    //           array_push($course, $row2['teacher_course_name']);
    //         }
            

    //         echo "
    //         <button type='button' class='collapsible'>$teacher_name</button>
    //         <div class='content2'>
    //             <table class='demo_table'>
    //             <tr>
    //               <td>Teacher ID : $teacher_id</td>
    //               <td>Teacher Name : $teacher_name</td>
    //             </tr>
    //             <tr>
    //               <td>Teacher Phone : $teacher_phone</td>
    //               <td>Teacher Department : $teacher_dept</td>
    //             </tr>
    //             <tr>
    //           </table>";
    //           echo "COURSES : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    //           for($i = 0; $i < count($course); $i++){echo strtoupper($course[$i])."&nbsp&nbsp&nbsp&nbsp&nbsp";}
    //           echo "</div>";


    //       }
    //   }
    //   else{
    //     echo "ERROR : ".mysqli_error($conn);
    //   }
  
  ?>



<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content2 = this.nextElementSibling;
    if (content2.style.display === "block") {
      content2.style.display = "none";
    } else {
      content2.style.display = "block";
    }
  });
}
</script>

</body>
</html>

