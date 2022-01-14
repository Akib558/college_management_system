<?php
    session_start();

    if(isset($_POST['REGISTER']))
    {
        
            $teacher_id = $_POST['teacher_id'];
            $teacher_name = $_POST['teacher_name'];
            $teacher_phone = $_POST['teacher_phone'];
            $teacher_dept = $_POST['teacher_dept'];

            $value = $_SESSION['teacher_id_value'];

            $db_servername = "localhost";
            $db_username = "user2";
            $db_password = "passuser2";
            $db_name = "db1";
            $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
            

            $sql = "insert into teacher_info (teacher_id, teacher_name, teacher_phone, teacher_dept) values ('$teacher_id', '$teacher_name', '$teacher_phone', '$teacher_dept');";

            if(mysqli_query($conn, $sql))
            {
                echo "SUCCESS";
                // $_SESSION['tem_value'] = 1;
                header("Location: ../templates/tem_admin_profile.php");
                
            }
            else{
                echo "NOT SUCCESS".mysqli_error($conn);
            }


        
    }



?>