<?php
session_start();

$db_servername = "localhost";
      $db_username = "user2";
      $db_password = "passuser2";
      $db_name = "db1";

      $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);


    $year =       $_SESSION['tt_year'];
    $semester =   $_SESSION['tt_semester'];
    $session =    $_SESSION['tt_session'];
    $student_id = $_SESSION['tt_student_id'];
    $department = $_SESSION['tt_department'];
    $email = $_SESSION['tt_email'];

    $teacher_id =   $_SESSION['teacher_id'];
    $teacher_name =   $_SESSION['teacher_name'];    
    $teacher_phone =   $_SESSION['teacher_phone'];   
    $teacher_dept =   $_SESSION['teacher_dept'] ; 
    $teacher_email =   $_SESSION['teacher_email'];   
    $teacher_password =   $_SESSION['teacher_password'];


    if(strtoupper($department) == "CSE")
    {

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
                // echo $dept;
                if(strtoupper($val) == "CSE")
                {
                    array_push($course_name, str_ireplace(array('-'), '_', $row['teacher_course_name']));
                }
                else{
                    array_push($course_name2, str_ireplace(array('-'), '_', $row['teacher_course_name']));
                }
            }

        }
        else{
            echo "ERROR 1";
            echo $sql;
        }


        // for($i = 0; $i < count($course_name); $i++)
        // {
        //     echo $course_name[$i];
        // }


        $sql_cse = "update education_cse set ";


            for($i = 0; $i <= count($course_name)-1; $i++)
            {
                $tt = $_POST[$course_name[$i]];
                $sql_cse = $sql_cse.$course_name[$i]." = '"."$tt"."', ";
            }
    
            // for($i = 0; $i < count($course_name)-1; $i++)
            // {
            //     $sql_cse = $sql_cse.$course_name[$i].",";
            // }
            $tt = $_POST[$course_name[count($course_name)-1]];  

            $sql_cse = $sql_cse.$course_name[count($course_name)-1]." = '"."$tt"."' where student_email = '$email'
            and year='$year' and semester='$semester' and session='$session' ;";



            if(mysqli_query($conn,$sql_cse))
            {
                echo "SUCCESS";
            header("Location: ../templates/tem_teacher_education.php");

            }
            else
            {
                echo "ERROR2  : <br>";
                echo $sql;
            }






    }
    else if($department == "EEE"){

        $sql_eee = "select ";
            for($i = 0; $i < count($column)-1; $i++)
            {
                $sql_eee = $sql_eee.$column[$i].',';
            }
    
            for($i = 0; $i < count($course_name2)-1; $i++)
            {
                $sql_eee = $sql_eee.$course_name2[$i].",";
            }
    
            $sql_eee = $sql_eee.$course_name2[count($course_name2)-1]." from education_eee where student_email='$email'
            and year='$year' and semester='$semester' and session='$session' ;";
    



        echo "EEE DB";
    }
    else{
        echo "NON VALID department";
    }

?>