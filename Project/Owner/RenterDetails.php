<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["rid"]))
{
	$renter_id=$_GET["rid"];
  $_SESSION["renterid"]=$renter_id;
			
			header("location:AddRentAgreement.php");
	
}

if(isset($_GET["vid"]))
{
	$renter_id=$_GET["vid"];
  $_SESSION["renterid"]=$renter_id;
			
			header("location:ViewRentAgreement.php");
	
}

if(isset($_GET["cid"]))
{
	$renter_id=$_GET["cid"];
  $_SESSION["renterid"]=$renter_id;
			
			header("location:HouseComplaints.php");
	
}
if(isset($_GET["pid"]))
{
	$renter_id=$_GET["pid"];
  $_SESSION["renterid"]=$renter_id;
			
			header("location:RentPayments.php");
	
}
if(isset($_GET["lid"]))
{
	$renter_id=$_GET["lid"];
  $_SESSION["renterid"]=$renter_id;
			
			header("location:RentLeaveRequest.php");
	
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
$selQry = "select * from tbl_renter r inner join tbl_user u inner join tbl_place p inner join tbl_district d where r.user_id=u.user_id and u.place_id=p.place_id and p.dist_id=d.dist_id and r.house_id='".$houseid."' and r.renter_status=0";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
?>
  <table width="388" height="543" border="1">
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
      <td colspan="2"><p align="center"><a href="RenterDetails.php?rid=<?php echo $data["renter_id"];?>">Add Agreement</a></p>
      <p align="center"><a href="RenterDetails.php?cid=<?php echo $data["renter_id"];?>">View Complaints</a></p>
      <p align="center"><a href="RenterDetails.php?vid=<?php echo $data["renter_id"];?>">View Agreement</a></p>
      <p align="center"><a href="RenterDetails.php?pid=<?php echo $data["renter_id"]; ?>">Rent Payments</a></p>
      <p align="center"><a href="RenterDetails.php?lid=<?php echo $data["renter_id"]; ?>">Leave Request</a></p>
      <p align="center">
        <?php
  }
	 
  ?>
      </p></td>
    </tr>
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>