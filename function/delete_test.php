<?php

require '../function/db_connect.php';
$test_id = filter_input(INPUT_GET, 'id');
$sql = "DELETE FROM tbl_test WHERE test_id='$test_id'";
mysqli_query($conn, $sql);
header("Location: http://localhost/hospital_management_system/manage_test.php");
?>