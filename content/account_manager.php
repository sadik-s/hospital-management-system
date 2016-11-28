<?php
    $testBills = null;
    $patientDetails = null;
    $reports = null;
    if(isset($_POST['GenerateBill']) && isset($_POST['patient_id'])){
        $patient_id = $_POST['patient_id'];
        $sql = "SELECT * FROM tbl_patient WHERE patient_id=".$patient_id;
        $result = mysqli_query($conn, $sql);
        $patientDetails = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM tbl_report, tbl_test WHERE patient_id=".$patient_id." and tbl_report.test_id=tbl_test.test_id";
        $reports = mysqli_query($conn, $sql);
    }
$sql = "SELECT * FROM tbl_patient";
$result = mysqli_query($conn, $sql);
?>
<script>
    function check_delete()
    {
        var chk = confirm('Are You Want To Delete This');
        if (chk)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<div class="content">
    <div class="container-fluid">
        <div class="row">                   
            <div class="col-md-12">
                <div class="card">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="add_account.php"><i class="fa fa-globe"></i> Account Manager</a></li>
                        <li class="active">Bills</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Bill Generation</h4>
                    </div>
                    <div class="content">
                        <div class="billing-form">
                            <form action="" method="post">
                                <div class="form-group col-md-4 col-md-offset-4" style="">
                                    <label for="patient_id" style="font-weight: bold; font-size: 15px; text-transform: none;">Patient</label>
                                    <select name="patient_id" id="patient_id" class="form-control">
                                        <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['patient_id'] ?>" <?php if(isset($patientDetails)&&$patientDetails){if($patientDetails['patient_id']==$row['patient_id']) echo 'selected'; } ?>><?php echo $row['patient_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <input type="submit" name="GenerateBill" class="btn pull-right" value="Generate Bill">
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix"></div>
                            <br>
                        </div>

                    </div>
                </div>
            </div>  
        </div>
    <?php if($patientDetails){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 40px 30px;">

                    <div class="header">
                        <h3 class="title" style="text-align: center; color: #000;">Hospital Management System</h3>
                    </div>
                    <br> <br>
                    <div class="content">
                        <fieldset style="width: 80%; margin: auto;">
                            <legend>Patient Details:</legend>
                            <table class="table table-borderless" style="border: none !important;">
                                <tr class="table-borderless">
                                    <td class="text-right">Name</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['patient_name']; ?></td>
                                    <td></td>
                                    <td class="text-right">Contact</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['patient_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">NID</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['patient_nid']; ?></td>
                                    <td></td>
                                    <td class="text-right">Admission Date</td>
                                    <td>:</td>
                                    <td><?php echo $patientDetails['admission_date']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Address</td>
                                    <td>:</td>
                                    <td colspan="5"><?php echo $patientDetails['patient_address']; ?></td>
                                </tr>
                            </table>
                        </fieldset> <br> <br>
                        <?php if(isset($reports)&&$reports!=null && mysqli_num_rows($reports)){?>
                        <fieldset style="width: 80%; margin: auto;">
                            <legend>#Test Bill</legend>
                            <table class="table table-borderless" style="border: none !important;">
                                <tr>
                                    <td class="">Test Name</td>
                                    <td class="">Result</td>
                                    <td class="">Publishing Date</td>
                                    <td class="">Testing Cost</td>
                                </tr>
                                <?php
                                    $total = 0;
                                    while ($row = mysqli_fetch_assoc($reports)) {
                                ?>
                                <tr class="table-borderless">
                                    <td><?php echo $row['test_name']; ?></td>
                                    <td><?php echo $row['report_result']; ?></td>
                                    <td><?php echo $row['report_published_date']; ?></td>
                                    <td><?php echo $row['cost']; $total+=$row['cost']; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><strong><?php echo $total; ?></strong></td>
                                </tr>
                            </table>
                        </fieldset>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>