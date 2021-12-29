<?php

    session_start();

    $limit = $_SESSION['count'];

    $db_servername = "localhost";
    $db_username = "user2";
    $db_password = "passuser2";
    $db_name = "db1";

    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);   
    
    
    
    
    if(isset($_POST['REGISTER']))
    {

        $name = $_SESSION['email'];
        $pp = str_ireplace(array('@','.'),'_',$name);


        $sql = "drop table $pp";

        if(mysqli_query($conn, $sql))
        {
            $sql = "create table $pp (course_title varchar(100), status varchar(100));";
            if(!mysqli_query($conn, $sql))
            {
                echo "Error1: ". mysqli_error($conn);
            }
        }
        else{

            $sql = "create table $pp (course_title varchar(100), status varchar(100));";
            if(!mysqli_query($conn, $sql))
            {
                echo "Error2: ". mysqli_error($conn);
            }
        }








        $count = 0;
        while($count <= $limit)
        {
            if(isset($_POST[$count]))
            {
                $course_name = $_POST[$count];
                $sql = "insert into $pp (course_title, status) values ('$course_name', 'done')";
                if(!mysqli_query($conn, $sql))
                {
                    echo "Error3: ". mysqli_error($conn);    
                }

            }
            // else{
            //     $course_name = $_POST[$count];
            //     $sql = "insert into $name (course_title, status) values ($course_name, 'not_done')";
            //     mysqli_query($conn, $sql);
            // }
            $count++;
        }
        header("Location: ../templates/tem_courses_2.php?signup=success");
        

    }


    echo "it's ended";


?>