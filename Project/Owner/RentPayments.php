<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$renterid=$_SESSION["renterid"];
include("../Assets/SessionValidator.php");
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
    <td>Payment Amount</td>
    <td>Payment Date</td>
    <td>Payment Details</td>
  </tr>
  </thead>
                                <tbody>
  <?php
  $selectqry="select * from tbl_rent r inner join tbl_renter e inner join tbl_user u,tbl_house h where r.renter_id=e.renter_id and e.user_id=u.user_id and e.house_id=h.house_id and r.renter_id='".$renterid."'";
  
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data["house_price"]; ?></td>
    <td><?php echo $data["rent_date"]; ?></td>
    <td><a href="">Payment Details</a></td>
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