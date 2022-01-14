<?php

session_start();

if(isset($_POST['REGISTER']))
{
    $fname = $_POST['reg_f_name'];
    $lname = $_POST['reg_l_name'];
    $department = $_POST['department'];
    $section = $_POST['section'];
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];
    $email = $_POST['reg_email'];
    $password = $_POST['reg_pass'];
    $student_id = $_POST['student_id'];


    $db_servername = "localhost";
    $db_username = "user2";
    $db_password = "passuser2";
    $db_name = "db1";

    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

    $sql = "update reg set fname='$fname', lname='$lname', department='$department', section='$section', blood_group='$blood_group', address='$address', email='$email', password='$password' ,student_id='$student_id' where student_id='$student_id';";

    if(mysqli_query($conn, $sql))
    {
        echo "SUCCESS";
        header("Location: ../templates/tem_admin_student.php");
        
    }
    else{
        echo "ERROR : ".mysqli_error($conn);
    }

}












?>


























