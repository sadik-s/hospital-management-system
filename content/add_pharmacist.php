<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="manage_pharmacist.php"><i class="fa fa-globe"></i> Manage Pharmacist</a></li>
                        <li class="active">Add Pharmacist</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Add Pharmacist</h4>
                    </div>
                    <div class="content">
                        <form action="" method="POST">
                            <?php
                            if (!empty($pharmacist_name)) {
                                if (mysqli_query($conn, $sql_insert)) {
                                    echo "New record created successfully";
                                } else {
                                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Name</label>
                                        <input type="text" name="pharmacist_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Address</label>
                                        <input type="text" name="pharmacist_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Phone</label>
                                        <input type="text" name="pharmacist_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Pharmacist Email</label>
                                        <input type="text" name="pharmacist_email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill">Add Pharmacist</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>