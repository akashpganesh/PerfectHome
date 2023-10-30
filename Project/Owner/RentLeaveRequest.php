<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$renterid= $_SESSION["renterid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_accept"]))
{
	$updateqry="update tbl_house set house_status=1,house_rentpayment=0 where house_id='".$houseid."'";
	$updateqry2="update tbl_renter set renter_status=1 where renter_id='".$renterid."'";
	$updateqry3="update tbl_rentrequest set rentreq_status3=0 where house_id='".$houseid."'"; 
	 if($conn->query($updateqry)&&$conn->query($updateqry2)&&$conn->query($updateqry3))
  {
    ?>
        <script>
    alert("Accepted");
    window.location="RentDisplay.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentDisplay.php";
    </script>
        <?php
  }
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
<form id="form1" name="form1" method="post" action="">
<?php
$selectqry="select * from tbl_leaverequest where renter_id='".$renterid."'";
 $row=$conn->query($selectqry);
  if($data=$row->fetch_assoc())
  {
?>
  <table width="200" border="1">
    <tr>
      <td>Reason For Leaving</td>
      <td><?php echo $data["leavereq_reason"]; ?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_accept" id="btn_accept" value="Accept" />
      </div>        <div align="center"></div></td>
    </tr>
  </table>
  <?php
  }
  ?>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br />
</body>
</html><?php

include("footer.php");
?>