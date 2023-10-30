<?php

include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$leaseholderid=$_SESSION["leaseholderid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_pay"]))
{
	header("location:LeaseTotalAmountPaymentGateway.php");
}

$selectqry="select * from tbl_agreement where leaseholder_id='".$leaseholderid."'";
$selQry="select * from tbl_leaseholder h inner join tbl_lease l inner join tbl_owner o where h.lease_id=l.lease_id AND l.owner_id=o.owner_id AND leaseholder_id='".$leaseholderid."' ";

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
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
<?php
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
	  
$amount=$data["lease_amount"];
	  $advance=$data["lease_advance"];
	  $payment=$amount-$advance;
	  if($data["lease_paymentstatus"]==1)
	  {
	  ?>
      <table width="262" border="1">
      <tr>
      <td>Pay the Remaining Amount</td>
      <td><?php echo $payment; ?></td>
      </tr>
      <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_pay" id="btn_pay" value="Pay" />
      </div></td>
      </tr>
      </table>
      </form>
      <?php
	  }else{
      
$row1=$conn->query($selectqry);
	if($data1=$row1->fetch_assoc())
	{
		?>
  <table width="262" border="1">
  <?php
	 $row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
	  
		  ?>
      
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/House/<?php echo $data["lease_photo"]; ?>" width="120" height="120" align="middle"></div></td>
    </tr>
    <tr>
      <td>House Name</td>
      <td><?php echo $data["lease_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["lease_address"]; ?></td>
    </tr>
    <tr>
      <td>Owner Name</td>
      <td><?php echo $data["owner_name"]; ?></td>
    </tr>
    <tr>
      <td colspan="2">View More...</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><a href="LeaseHouseComplaint.php">Complaints</a>  </p>
  <p><a href="LeaseLeaveRequest.php">Leave From House</a></p>
  <p><a href="ViewLeaseAgreement.php">View Lease Agreement</a></p>
</form>
<?php
		 }
  }
else{
	?>
    <form id="form1" name="form1" method="post" action="">
    <h3>Agreement is not added</h3>
    <input type="submit" name="btn_sent" id="btn_send" value="Send Request to the Owner" />
    </form>
    <?php
	}
	  }
  }
	?>
</center>
</body>
</html><?php

include("footer.php");
?>