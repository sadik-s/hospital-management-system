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
                        <li><a href="add_pharmacist.php"><i class="fa fa-globe"></i> Add Pharmacist</a></li>
                        <li class="active">Pharmacist Manager</li>
                    </ol>
                    <div class="header">
                        <h4 class="title">Pharmacist Manager</h4>
                        <p class="category">Here is you can manage your Hospital Pharmacists</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['pharmacist_name'] ?></td>
                                    <td><?php echo $row['pharmacist_address'] ?></td>
                                    <td><?php echo $row['pharmacist_phone'] ?></td>
                                    <td><?php echo $row['pharmacist_email'] ?></td>
                                    <td>
                                        <a href="edit_pharmacist.php?id=<?php echo $row['pharmacist_id']; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Pharmacist"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="function/delete_pharmacist.php?id=<?php echo $row['pharmacist_id']; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Pharmacist" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>