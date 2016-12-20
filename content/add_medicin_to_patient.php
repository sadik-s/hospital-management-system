<?php
session_start();
$admin_name=$_SESSION["admin_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HMS Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper"  style="height: 1000px !important;">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    HMS
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if($_SESSION["type"] == 1){ ?>
                    <li>
                        <a href="../manage_bed.php">
                            <i class="pe-7s-albums"></i>
                            <p>Bed Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_test.php">
                            <i class="pe-7s-graph3"></i>
                            <p>Test Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_ward.php">
                            <i class="pe-7s-culture"></i>
                            <p>Ward Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_admin.php">
                            <i class="pe-7s-user"></i>
                            <p>Admin Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_report.php">
                            <i class="pe-7s-menu"></i>
                            <p>Report Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_doctor.php">
                            <i class="pe-7s-id"></i>
                            <p>Doctor Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_patient.php">
                            <i class="pe-7s-umbrella"></i>
                            <p>Patient Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_department.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Department Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="pharmacist_manager.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Pharmacist Manager</p>
                        </a>
                    </li>
                    <li>
                        <a href="../manage_account.php">
                            <i class="pe-7s-drawer"></i>
                            <p>Account Manager</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if($_SESSION["type"] == 3){ ?>
                    <li class="active">
                        <a href="../add_medicin_to_patient.php"> <i class="pe-7s-drawer"></i><p>Sell Medicine to patient</p></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                <i>Welcome! </i> <?php echo $_SESSION["admin_name"]?>
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/hospital_management_system/function/logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <br><br>

        <?php
        require '../function/db_connect.php';
        $allPatients = "SELECT * FROM tbl_patient";
        $allMedicine  = "SELECT * FROM tbl_medicine";
        $patients = mysqli_query($conn, $allPatients);
        $Medicines = mysqli_query($conn, $allMedicine);

        ?>

        <div class="col-md-8">
            <form action="" method="post">
                <div class="row">
                    <table class="table" id="data">
                        <tr>
                            <td>Select Patient</td>
                            <td>:</td>
                            <td>
                                <select name="patient_id" id="patient-id" type="text" class="form-control">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($patients)) {
                                        ?>
                                        <option value="<?php echo $row['patient_id'] ?>"><?php echo '#'.$row['patient_id'] .' '. $row['patient_name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input name="submit" type="submit" style="margin-left: 10px;"  value="Submit"/>
                    <input type="button" id="addnew" name="addnew" value="Add Medicine" />
                    <input type="hidden" id="items" name="items" value="1" />
                </div>
            </form>

            <!--    <select name="selectinput" id="selectinput">-->
            <!--        <option value="" id="options"></option>-->
            <!--    </select>-->
        </div>


    </div>



    <?php require 'footer.php'; ?>
</div>
</div>
<?php
$result_array = array();
while($row = mysqli_fetch_assoc($Medicines))
{
//    $result_array[] = $row;
    $option .= '<option value = "'.$row['name'].'|'.$row['price'].'|'.$row['store'].'|'.$row['sold'].'">'.$row['name'].'</option>';

}
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function() {
        var currentItem = 1;

        var jArray= <?php echo json_encode($result_array ); ?>;

//        $.each(jArray, function(i, item) {
////            var strToAdd2 =
//            $('#selectinput').append('<option>'+jArray[i].name+'</option>');
//        })



        $('#addnew').click(function(){
            currentItem++;
            $('#items').val(currentItem);
//            $.each(jArray, function(i, item)
//            {
//                $('#target1').append('<option>'+jArray[i].name+'</option>');
//                $('#target2').append('<option>'+jArray[i].name+'</option>');
//                $('#target3').append('<option>'+jArray[i].name+'</option>');
//                $('#target4').append('<option>'+jArray[i].name+'</option>');
//            })
            var strToAdd = '<tr><td>Medicine</td><td>:</td><td><select class="form-control" name="medicine[]" id="target'+currentItem+'" type="text" ><?php echo $option; ?></select></td><td>Quantity</td><td>:</td><td><input type="text" class="form-control" name="quantity[]" /></td></tr>';
            $('#data').append(strToAdd);
        });
    });
</script>

<?php
if (isset($_POST['submit'])){
    $prefix = $allMedicineString = '';
    $selectedMedicines = array();
    foreach ($_POST["medicine"] as $medicin) {

        $option_explode = explode('|', $medicin);

        $selectedMedicines[] = $option_explode[0];

        $allMedicineString .= $prefix . '"' . $option_explode[0] . '"';
        $prefix = ', ';
    }


// loop for selecting the prices
    $price = array();
    foreach ($_POST["medicine"] as $medicin) {
        $option_explode = explode('|', $medicin);
        $price[] =  $option_explode[1];
    }


// loop for selecting the store
    $store = array();
    foreach ($_POST["medicine"] as $medicin) {
        $option_explode = explode('|', $medicin);
        $store[] =  $option_explode[2];
    }
    print_r($store);

// loop for selecting the sold
    $sold = array();
    foreach ($_POST["medicine"] as $medicin) {
        $option_explode = explode('|', $medicin);
        $sold[] =  $option_explode[3];
    }
    print_r($sold);

// loop for selecting the quantity and update the medicine table info
    $quantity = array();
    $length = 0;
    foreach ($_POST["quantity"] as $quantities) {
        $quantity[] = $quantities;
        $length++;
    }

// calculating the total cost of medicine
    $total_cost = 0;
    for ($i=0;$i<=$length;$i++) {
        $total_cost += (($price[$i])*($quantity[$i]));
    }
// update the amounts of medicines in medicines table
    $j=0;
    foreach ($_POST["medicine"] as $medicin) {
        $currentMedicine = $selectedMedicines[$j];
        $currentStore = $store[$j] - $quantity[$j];
        $currentSold =  $sold[$j] + $quantity[$j];

        $update_query  = "UPDATE tbl_medicine SET store = $currentStore, sold = $currentSold WHERE name = '$currentMedicine';";
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            echo "updated";
        }
        else{
            echo "not updated";
        }
        $j++;
    }


    $patient_id = $_POST['patient_id'];
    $query  = "INSERT into  tbl_medicine_history (patient_id, medicines, total_cost) VALUES ('$patient_id', '$allMedicineString' , '$total_cost')";

    $result =  mysqli_query($conn, $query);
    if ($result){
        echo("<script> alert('Medicine successfully sell');</script>");
//        header("Location: pharmacist_manager.php");
    }
    else
        echo "not edited!!";
}


?>
</body>
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>

<!---->
<!--$que = "insert INTO tbl_patient(patient,target) VALUES ('".$_POST['type']."','".$year."','".$month."','".$week."','".$actual."','".$max."','".$target."')";-->
<!--mysqli_query($conn,$que);-->

