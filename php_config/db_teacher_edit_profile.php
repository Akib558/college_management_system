<?php
    session_start();

    if(isset($_POST['REGISTER']))
    {
        if(isset($_SESSION['teacher_id']))
        {
            $teacher_id = $_POST['teacher_id'];
            $teacher_name = $_POST['teacher_name'];
            $teacher_phone = $_POST['teacher_phone'];
            $teacher_dept = $_POST['teacher_dept'];
            $teacher_email = $_POST['teacher_email'];
            $teacher_password = $_POST['teacher_password'];


            $value = $_SESSION['teacher_id_value'];

            $db_servername = "localhost";
            $db_username = "user2";
            $db_password = "passuser2";
            $db_name = "db1";
            $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
            

            $sql = "update teacher_info set teacher_id='$teacher_id',teacher_name='$teacher_name', teacher_phone='$teacher_phone',teacher_dept='$teacher_dept', teacher_email='$teacher_email', password='$teacher_password' where teacher_id='$teacher_id';";

            //echo $sql;

            if(mysqli_query($conn, $sql))
            {
                echo "SUCCESS";
                $_SESSION['tem_value'] = 1;

                $_SESSION['teacher_id']       = $teacher_id;
                $_SESSION['teacher_name']     = $teacher_name;
                $_SESSION['teacher_phone']    = $teacher_phone;
                $_SESSION['teacher_dept']     = $teacher_dept;
                $_SESSION['teacher_email']    = $teacher_email;
                $_SESSION['teacher_password'] = $teacher_password;


                header("Location: ../templates/tem_teacher_edit_profile.php");
                
            }
            else{
                echo "NOT SUCCESS".mysqli_error($conn);
            }


        }  
        else{
            echo "teacher_id_value is not set";
        }
    }



?>