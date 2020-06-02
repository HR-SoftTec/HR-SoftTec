<?php


//===================================================================== 
//=====================================================================

   if (isset($_POST['btn'])) {

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

    $sql = "SELECT * FROM tbl_current_date";

    if (mysqli_query($con, $sql)) {
        $row_result = mysqli_query($con, $sql);
        $row_id = mysqli_fetch_assoc($row_result);
        $date_row = $row_id['id'];
    } else {
        die('query problem' . mysqli_error($con));
    }



    $sql = "DELETE FROM tbl_current_date WHERE id='$date_row'";

    if (mysqli_query($con, $sql)) {
        
    } else {
        die('query problem' . mysqli_error($con));
    }



    $date_value = 'date';
    $sql = "INSERT INTO tbl_current_date(today_date)VALUES('$date_value')";

    if (mysqli_query($con, $sql)) {
        
    } else {
        die('query problem' . mysqli_error($con));
    }


    $sql = "SELECT * FROM tbl_current_date WHERE today_date='$date_value'";

    if (mysqli_query($con, $sql)) {
        $date_result = mysqli_query($con, $sql);
        $curent_date = mysqli_fetch_assoc($date_result);
    } else {
        die('query problem' . mysqli_error($con));
    }

    $today_date = $curent_date['curent_date'];
    $today_date = strtotime($today_date);
    $date_update = date('d-m-Y', $today_date);



    $sql = "UPDATE tbl_current_date SET today_date='$date_update'";
    if (mysqli_query($con, $sql)) {
         $sql = "SELECT * FROM tbl_current_date";

    if (mysqli_query($con, $sql)) {
        $row_resultt = mysqli_query($con, $sql);
        $row_idd = mysqli_fetch_assoc($row_resultt);
      
    } else {
        die('query problem' . mysqli_error($con));
    }
    } else {
        die('query problem' . mysqli_error($con));
    }
}
?>

<html>
    <head>
        <title>Date</title>
    </head>
    <body>
        
        <form action="" method="post">
            <table border="1" style="text-align: center;margin: 14px">
                
                <tr>
                    <th>Action</th>
                    <th>Timestamp</th>
                    <th>Date</th>
                    
                </tr>
                <tr>
                    <td><button type="submit" name="btn">Chgange date</button></td>
                </tr>
                <tr>
                    <td><h1><?php echo $row_idd['curent_date'];?></h1></td>
                </tr>
                <tr>
                    <td><h1><?php echo $row_idd['today_date'];?></h1></td>
                </tr>
                
            </table>
            
            
        </form>
        
        
        
    </body>
    
</html>