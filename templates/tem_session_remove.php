<?php

session_start();

session_unset();

// destroy the session
session_destroy(); 

// header("Location: ../index.php");
echo "success";
header("Location: ../index.php?signup=success");

?>