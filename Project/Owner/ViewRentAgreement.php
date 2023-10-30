<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$renterid= $_SESSION["renterid"];
include("../Assets/SessionValidator.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>
<?php
include("header.php");
?>
<br /><br /><br /><br /><br /><br />
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
  <?php
  $selQry = "select * from tbl_agreement where renter_id='".$renterid."'"; 
	 $row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
	  ?>
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/House/<?php echo $data["agreement_file"]; ?>" width="180" height="320">
        </div>
      </div></td>
    </tr>
    <tr>
      <td>From Date</td>
      <td><?php echo $data["agreement_fromdate"]; ?></td>
    </tr>
    <tr>
      <td>To Date</td>
      <td><?php echo $data["agreement_todate"]; ?></td>
    </tr>
    <tr>
    <td colspan="2">
      <div align="center">
        <?php
	$date1=date("Y-m-d");
	$date2=$data["agreement_todate"];
	if($date1>$date2)
	{
		?>
        <a href="RenewRentAgreement.php">Renew Agreement</a></div>
      <?php
	}
  }
  ?></td>
    </tr>
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>