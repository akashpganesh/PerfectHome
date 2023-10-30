<?php
include("../Assets/Connection/Connection.php");

session_start();
include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	
  $_SESSION["renterid"]=$_GET["oid"];
			
			header("location:RentPayments.php");
	
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
      <td>SI NO</td>
      <td>House Name</td>
      <td>Renter Name</td>
      <td>View</td>
    </tr>
    </thead>
                                <tbody>
    <?php
	$selectqry="select * from tbl_renter r inner join tbl_house h,tbl_user u where r.house_id=h.house_id and r.user_id=u.user_id and r.renter_status=0";
	$row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["house_name"]; ?></td>
      <td><?php echo $data["user_name"]; ?></td>
      <td><a href="RentPaymentMain.php?oid=<?php echo $data["renter_id"];?>">View Payments</a></td>
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