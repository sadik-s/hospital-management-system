<?php
    session_start();
    $admin_name=$_SESSION["admin_name"];

    if ($admin_name == NULL)
    {
        header("location: http://localhost/hospital_management_system/login.php");
    }
    require 'function/db_connect.php';

    $ward = "SELECT * FROM tbl_ward";
    $all_ward = mysqli_query($conn, $ward);

    $bed = "SELECT * FROM tbl_bed";
    $all_bed = mysqli_query($conn, $bed);

$bed = "SELECT * FROM tbl_doctor";
    $all_doctor = mysqli_query($conn, $bed);

    $ward_id=filter_input(INPUT_POST, 'ward_id');
    $bed_id=filter_input(INPUT_POST, 'bed_id');
    $doc_id=filter_input(INPUT_POST, 'doc_id');
    $patient_name=filter_input(INPUT_POST, 'patient_name');
    $patient_address=filter_input(INPUT_POST, 'patient_address');
    $patient_phone=filter_input(INPUT_POST, 'patient_phone');
    $patient_nid=filter_input(INPUT_POST, 'patient_nid');
    $admission_date=filter_input(INPUT_POST, 'admission_date');
    $date = new DateTime($admission_date);
    $admission_date = $date->format('Y-m-d');


    $sql = "INSERT INTO tbl_patient (ward_id,bed_id,doc_id,patient_name,patient_address,patient_phone,patient_nid,admission_date)
        VALUES ('$ward_id','$bed_id','$doc_id','$patient_name','$patient_address','$patient_phone','$patient_nid','$admission_date')";
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>SMS Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="assets/css/jquery-ui.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>

    <body> 
        <div class="wrapper" style="height: 1000px;">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">    
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="index.php" class="simple-text">                             SMS                         </a>
                    </div>
                    <?php require 'content/nav.php'; ?> 
                </div>
            </div>
            <div class="main-panel">
                <?php require 'content/header.php'; ?>
                <?php require 'content/add_patient.php'; ?>
                <?php require 'content/footer.php'; ?>
            </div>   
        </div>
    </body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui.js" type="text/javascript"></script>
    <script>
        $('#Form').validate();
        $(document).ready(function () {
            $('#date').datepicker({dateFormat:"mm/dd/yy"}).datepicker("setDate",new Date());
        });
    </script>
</html>