<?php

include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_pay"]))
{
	header("location:Payment-Gateway-blue.php");
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
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="491" border="1">
  <?php
$selQry = "select * from tbl_house h inner join tbl_owner o where h.owner_id=o.owner_id AND house_id='".$houseid."'";
$row=$conn->query($selQry); 
  if($data=$row->fetch_assoc())
  {

?>
    <tr>
      <td rowspan="3"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></td>
      <td>House Name : <?php echo $data["house_name"]; ?></td>
    </tr>
    <tr>
      <td>Address : <?php echo $data["house_address"]; ?></td>
    </tr>
    <tr>
      <td>Owner Name : <?php echo $data["owner_name"]; ?></td>
    </tr>
    <tr>
      <td>Rent /Month</td>
      <td><?php echo $data["house_price"]; ?></td>
    </tr>
    <tr>
      <td>Security Amount</td>
      <td><?php echo $data["house_securityamount"]; ?></td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td>Pay Security Amount</td>
      <td><div align="center">
       <?php
$selQry = "select * from tbl_renter where house_id='".$houseid."' AND user_id='".$userid."' and renter_status=0";
$row=$conn->query($selQry); 
  if($data=$row->fetch_assoc())
  {
?>
       paid
       <?php }else{ ?>
        <input type="submit" name="btn_pay" id="btn_pay" value="Pay" />
        <?php
  }
  ?>
      </div></td>
    </tr>
   
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>