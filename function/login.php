<?php
    
    session_start();

    require 'db_connect.php';

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_admin WHERE admin_email = '$email' AND admin_password = '$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['admin_name'];
    $count = mysqli_num_rows($result);
     
    if ($count == 1) {
        $_SESSION["admin_name"] = $row['admin_name'];
        $_SESSION["type"] = $row['type'];
        $_SESSION["id"] = $row['admin_id'];
        header("location: http://localhost/hospital_management_system/index.php");
    } 
    
    else {
        header("location: http://localhost/hospital_management_system/failed.php");
    }
}
else
    echo "not posted";
?>