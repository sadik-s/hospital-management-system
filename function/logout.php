<?php
    
    session_start();

    session_destroy();
    header("location: http://localhost/hospital_management_system/login.php");
?>