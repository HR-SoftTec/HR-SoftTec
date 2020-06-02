<?php
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'bismilllah_enterprise_oxygen';
$con = mysqli_connect($host_name, $user_name, $password);

if ($con) {
    $db_select = mysqli_select_db($con, $db_name);
    if ($db_select) {
        
    } else {
        die("Database not selected" . mysqli_errno($con));
    }
} else {
    die("Database connection failed" . mysqli_errno($con));
} 