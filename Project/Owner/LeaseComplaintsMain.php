<?php
include("../Assets/Connection/connection.php");

session_start();
include("../Assets/SessionValidator.php");

if(isset($_GET["rid"]))
{
	$complaint_id=$_GET["rid"];
  $_SESSION["complaintid"]=$complaint_id;
			
			header("location: ../Owner/ComplaintReplay.php");
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
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
      <td><div align="center">SI NO</div></td>
      <td><div align="center">Complaint</div></td>
      <td><div align="center">Lease Holder Name</div></td>
      <td><div align="center">House Name</div></td>
      <td><div align="center">Reply</div></td>
    </tr>
    </thead>
                                <tbody>
     <?php
  $selectqry="select * from tbl_complaint c inner join tbl_leaseholder h inner join tbl_user u,tbl_lease l where c.leaseholder_id=h.leaseholder_id and h.user_id=u.user_id and h.lease_id=l.lease_id and leaseholder_status=0 and complaint_type=1";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	  ?>
    <tr>
      <td><div align="center"><?php echo $i; ?></div></td>
      <td><div align="center"><?php echo $data["complaint_discription"]; ?></div></td>
      <td><div align="center"><?php echo $data["user_name"]; ?></div></td>
      <td><div align="center"><?php echo $data["lease_name"]; ?></div></td>
      <td><div align="center"><a href="HouseComplaints.php?rid=<?php echo $data["complaint_id"];?>">Reply</a></div></td>
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
</html><?php

include("footer.php");
?>