<?php
$pharmacist_id = filter_input(INPUT_POST, 'pharmacist_id');
$pharmacist_name=filter_input(INPUT_POST, 'pharmacist_name');
$pharmacist_address=filter_input(INPUT_POST, 'pharmacist_address');
$pharmacist_phone=filter_input(INPUT_POST, 'pharmacist_phone');
$pharmacist_email=filter_input(INPUT_POST, 'pharmacist_email');
$sql = "UPDATE tbl_pharmacist SET pharmacist_name='$pharmacist_name', pharmacist_address='$pharmacist_address',
 pharmacist_phone='$pharmacist_phone', pharmacist_email='$pharmacist_email' WHERE pharmacist_id='$pharmacist_id' ";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_pharmacist.php"><i class="fa fa-globe"></i> Manage Pharmacist</a></li>
                        <li class="active">Edit Pharmacist</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Edit Pharmacist</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST" name="edit_doctor">
                            <?php
                            if (!empty($pharmacist_name)) {
                                if (mysqli_query($conn, $sql)) {
                                    echo "Update record created successfully";
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Name</label>
                                        <input type="text" name="pharmacist_name" value="<?php echo $row['pharmacist_name']?>" class="form-control">
                                        <input type="hidden" name="pharmacist_id" value="<?php echo $row['pharmacist_id']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Address</label>
                                        <input type="hidden" name="pharmacist_address" value="<?php echo $row['pharmacist_address']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Phone</label>
                                       <input type="hidden" name="pharmacist_phone" value="<?php echo $row['pharmacist_phone']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Email</label>
                                        <input type="text" name="pharmacist_email" value="<?php echo $row['pharmacist_email']?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Edit Pharmacist</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>