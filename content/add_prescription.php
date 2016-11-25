<?php
$doctor = "SELECT * FROM tbl_doctor";
$all_doctor = mysqli_query($conn, $doctor);

$patient = "SELECT * FROM tbl_patient";
$all_patient = mysqli_query($conn, $patient);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_prescription.php"><i class="fa fa-globe"></i> Manage Prescription</a></li>
                        <li class="active">Add Prescription</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Prescription</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                            if (!empty($doctor_id)) {
                                if (mysqli_query($conn, $sql)) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Select Doctor</label>
                                        <select name="doctor_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_doctor)) {
                                                ?> 
                                                <option value="<?php echo $row['doctor_id'] ?>"><?php echo $row['doctor_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Select Patient</label>
                                        <select name="patient_id" class="form-control">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($all_patient)) {
                                                ?> 
                                                <option value="<?php echo $row['patient_id'] ?>"><?php echo $row['patient_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>        
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Prescription</label>
                                        <textarea name="prescription" class="form-control"></textarea>
                                    </div>        
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Prescription</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                    
    </div>
</div>