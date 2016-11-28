<<<<<<< HEAD
<?php
 require 'function/db_connect.php';

 $total_patient = 0;
 $total_customer = 0;
 $total_supplier = 0;
 $total_bed = 0;
 $total_department = 0;
 $total_doctor = 0;
 $total_ward = 0;
 if ($result = $conn->query("SELECT patient_id FROM tbl_patient")) {
    $total_patient = $result->num_rows;
    $result->close();
	}
 if ($result = $conn->query("SELECT id FROM customer_details")) {
    $total_customer = $result->num_rows;
    $result->close();
	}
 if ($result = $conn->query("SELECT id FROM supplier_details")) {
    $total_supplier = $result->num_rows;
    $result->close();
	}
 if ($result = $conn->query("SELECT bed_id FROM tbl_bed")) {
    $total_bed = $result->num_rows;
    $result->close();
	}
 if ($result = $conn->query("SELECT department_id FROM tbl_department")) {
    $total_department = $result->num_rows;
    $result->close();
	}
 if ($result = $conn->query("SELECT doctor_id FROM tbl_doctor")) {
    $total_doctor = $result->num_rows;
    $result->close();
	}
if ($result = $conn->query("SELECT ward_id FROM tbl_ward")) {
    $total_ward = $result->num_rows;
    $result->close();
	}

?>


=======
>>>>>>> c161167ff5262b29a752081c85ac70c9f587fc88
<div class="content">
    <div class="container-fluid">    
        <div class="row">
            <div class="col-md-12">
<<<<<<< HEAD
                <h3>Welcome To Evis Hospital Management System</h3>
				
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo $total_patient ?> Patients </h3>
			    	</div>
			     </div>
				</div>
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo  $total_customer  ?> Customers </h3>

			    	</div>
			     </div>
				</div>
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo   $total_supplier  ?> Suppliers </h3>
			    	</div>
			     </div>
				</div>
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo  $total_bed ?> Beds </h3>
			    	</div>
			     </div>
				</div>
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo $total_department  ?> Departments </h3>
			    	</div>
			     </div>
				</div>
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo  $total_doctor ?> Doctors </h3>
			    	</div>
			     </div>
				</div>
				<div class="col-md-4">
				 <div class="panel panel-default">
			    	<div class="panel-body" style=" background: #9977DB;">
			    		<h3><?php echo  $total_ward ?> Wards </h3>
			    	</div>
			     </div>
				</div>
                
=======
                <h3>Welcome To Hospital Management System</h3>
				<img src="assets/img/b.jpg"  style="width:304px;height:228px;">
>>>>>>> c161167ff5262b29a752081c85ac70c9f587fc88
            </div>                  
        </div>      
    </div>    
</div>