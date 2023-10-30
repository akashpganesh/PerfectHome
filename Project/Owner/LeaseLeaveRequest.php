<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$leaseholderid=$_SESSION["leaseholderid"];
$leaseid=$_SESSION["leaseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_accept"]))
{
	header("location:PayBackPaymentGateway.php");
	
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
<br /><br /><br /><br /><br /><br />
<form id="form1" name="form1" method="post" action="">
<?php
$selectqry="select * from tbl_leaverequest where leaseholder_id='".$leaseholderid."'";
 $row=$conn->query($selectqry);
  if($data=$row->fetch_assoc())
  {
?>
  <table width="721" height="158" border="1">
    <tr>
      <td>Reason For Leaving</td>
      <td><?php echo $data["leavereq_reason"]; ?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_accept" id="btn_accept" value="Accept & Pay the Amount Back" />
      </div>        <div align="center"></div></td>
    </tr>
  </table>
  <?php
  }
  ?>
</form>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br />
</body>
</html><?php

include("footer.php");
?>