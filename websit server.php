<?php
$host_name = 'localhost';
$user_name = 'bismillahenterpr';
$password = 'bismillahoxygen123';
$db_name = 'bismillahenterprise';

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