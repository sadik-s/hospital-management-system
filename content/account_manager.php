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
                        <li><a href="add_account.php"><i class="fa fa-globe"></i> Manage Account</a></li>
                        <li class="active">Account Status</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Account Status</h4>
                        <p class="category">The Current account transaction of this hospital</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
								<th>Bed No</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
								$total=0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                     $total=$total +$row['amount'];
								   ?>   
                                    									
                                    <tr>
                                        <td><?php echo $row['patient_name'] ?></td>
                                        <td><?php echo $row['patient_phone'] ?></td>
                                        <td><?php echo $row['bed_id'] ?></td>
										 <td><?php echo $row['amount'] ?></td>
                                        <td>
                                    
                                            <a href="function/delete_account.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Patient" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
								<tr>
								<td></td>
								<td></td>
								<td>Total Taka-</td>
								<td><?php echo $total ?></td>
								<td></td>
								
								
								</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>                    
    </div>
</div>