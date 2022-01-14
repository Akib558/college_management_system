<?php

    if(isset($_POST['REGISTER']))
    {
        $board_id = $_POST['board_id'];
        $board_name = $_POST['board_name'];
        $board_date = $_POST['board_date'];
        $board_desc = $_POST['board_desc'];
    
        
        $db_servername = "localhost";
        $db_username = "user2";
        $db_password = "passuser2";
        $db_name = "db1";
        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        
        $value = $_POST['board_id'];

        // $sql = "select * from teacher_info where teacher_id='$value'";
        $sql = "insert into board(board_id, board_name, board_date, board_desc) values ('$board_id', '$board_name', '$board_date', '$board_desc');";

        if(mysqli_query($conn, $sql))
        {
            echo "SUCCESS";
        }
        else{
            echo "ERROR : ".mysqli_error($conn);
        }
        
    
    
    
    
    
    
    
    }









?>