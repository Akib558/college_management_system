<?php
session_start();
include_once 'db_config.php';
//These must be at the top of your script, not inside a function
require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
require '/usr/share/php/libphp-phpmailer/autoload.php';
require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';

function send_password_reset($name, $email, $token)
{
   
}

    if(isset($_SESSION['REGISTER']))
    {
        $email = $_POST['email'];
        $token = md5(rand());        

        $sql = "select * from reg where email = '$email';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $name = $row['fname'];
            $email = $row['email'];

            $update_token = "update reg set verify_token='$token' where email='$email';";

            $result2 = mysqli_query($conn, $update_token);

            if($result2)
            {
                send_password_reset($name, $email, $token);
                $_SESSION['status'] = "Link sent to the Email";
                header("Location: ../templates/tem_login.php");
            }
            else
            {
                echo "ERROR";
                $_SESSION['status'] = "something went wrong";
            }

        }
        else{

        }

    }
    else{
        echo "NO VALID";
        $_SESSION['status'] = "No Email Found";
        // Location to passwor page
    }



?>