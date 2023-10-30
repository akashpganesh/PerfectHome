<?php
include("../Assets/Connection/Connection.php");

session_start();

$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

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
$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND house_id='".$houseid."'";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {

?>
  <table width="404" border="1">
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></div></td>
    </tr>
    <tr>
      <td width="176">House Name</td>
      <td width="4"><?php echo $data["house_name"]; ?></td>
    </tr>
    <tr>
      <td>House Type</td>
      <td><?php echo $data["type_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["house_address"]; ?></td>
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
      <td>Landmark</td>
      <td><?php echo $data["house_landmark"]; ?></td>
    </tr>
    <tr>
      <td>Facilities</td>
      <td><?php echo $data["house_facilities"]; ?></td>
    </tr>
    <tr>
      <td>Rent /month</td>
      <td><?php echo $data["house_price"]; ?></td>
    </tr>
    <tr>
      <td>Security Amount</td>
      <td><?php echo $data["house_securityamount"]; ?></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="366" border="1">
    <tr>
      <td colspan="2">Owner Details</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/Owner/<?php echo $data["owner_photo"]; ?>" width="120" height="120"></div></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["owner_name"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["owner_contact"]; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["owner_email"]; ?></td>
    </tr>
  </table>
  <p>
    <?php
  }
  ?>
  </p>
  <p>Images</p>
  <table width="341" border="1">
  <tr>
  <?php
   $selQry = "select * from tbl_housegallary where house_id='".$houseid."'";
$row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
	  ?>
      <td><p><img src="../Assets/Files/House/Gallary/<?php echo $data["gallary_filename"]; ?>" width="120" height="120"></p>
        <p>&nbsp;</p>
        <p><?php echo $data["gallary_caption"]; ?></p></td>
    <?php
	if($i==4)
	{
		echo "</tr><tr>";
		
		$i=0;
	}
  }
  ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>