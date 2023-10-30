<?php
include("../Assets/Connection/Connection.php");

session_start();
include("../Assets/SessionValidator.php");

if(isset($_GET["rid"]))
{
	
  $_SESSION["complaintid"]=$_GET["rid"];
			
			header("location:ComplaintReplay.php");
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><?php
include("header.php");
?>

<center>
<form id="form1" name="form1" method="post" action="">
<section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
    <tr>
      <td>SI NO</td>
      <td>Complaint</td>
      <td>User</td>
      <td>House Name</td>
      <td>Owner Name</td>
      <td>Reply</td>
    </tr>
    </thead>
                                <tbody>
    <?php
  $selectqry="select * from tbl_complaint c inner join tbl_leaseholder l inner join tbl_user u,tbl_lease h inner join tbl_owner o where c.leaseholder_id=l.leaseholder_id and l.lease_id=h.lease_id and l.user_id=u.user_id and h.owner_id=o.owner_id and c.renter_id=0 and c.complaint_type=2 and l.leaseholder_status=0";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_discription"]; ?></td>
      <td><?php echo $data["user_name"]; ?></td>
      <td><?php echo $data["lease_name"]; ?></td>
      <td><?php echo $data["owner_name"]; ?></td>
      <td><a href="LeaseComplaints.php?rid=<?php echo $data["complaint_id"];?>">Replay</a></td>
    </tr>
    <?php
  }
	?>
                              </tbody>
                            </table>
                        </div>
                    </div>

                </section>
</form>
</center>
</body>
<script src="../Assets/Templates/Admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

</html><?php

include("footer.php");
?>