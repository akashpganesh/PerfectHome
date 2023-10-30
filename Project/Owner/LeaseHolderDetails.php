<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$leaseid=$_SESSION["leaseid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["aid"]))
{
	$leaseholder_id=$_GET["aid"];
  $_SESSION["leaseholderid"]=$leaseholder_id;
			
			header("location:AddLeaseAgreement.php");
	
}

if(isset($_GET["vid"]))
{
	$leaseholder_id=$_GET["vid"];
  $_SESSION["leaseholderid"]=$leaseholder_id;
			
			header("location:ViewLeaseAgreement.php");
	
}

if(isset($_GET["cid"]))
{
	$leaseholder_id=$_GET["cid"];
  $_SESSION["leaseholderid"]=$leaseholder_id;
			
			header("location:LeaseComplaints.php");
	
}
if(isset($_GET["lid"]))
{
	$leaseholder_id=$_GET["lid"];
  $_SESSION["leaseholderid"]=$leaseholder_id;
			
			header("location:LeaseLeaveRequest.php");
	
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
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
<?php
$selQry = "select * from tbl_leaseholder l inner join tbl_user u inner join tbl_place p inner join tbl_district d where l.user_id=u.user_id and u.place_id=p.place_id and p.dist_id=d.dist_id and l.lease_id='".$leaseid."' and l.leaseholder_status=0";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
?>
  <table width="200" border="1">
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/User/<?php echo $data["user_photo"]; ?>" width="120" height="120"></div></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data["dist_name"]; ?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"]; ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><p><a href="LeaseHolderDetails.php?aid=<?php echo $data["leaseholder_id"];?>">Add Agreement</a></p>
      <p><a href="LeaseHolderDetails.php?cid=<?php echo $data["leaseholder_id"];?>">View Complaints</a></p>
      <p><a href="LeaseHolderDetails.php?vid=<?php echo $data["leaseholder_id"];?>">View Agreement</a></p>
      <p><a href="LeaseHolderDetails.php?lid=<?php echo $data["leaseholder_id"];?>">Leave Request</a></p></td>
    </tr>
  </table>
  <?php
  }
  ?>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>