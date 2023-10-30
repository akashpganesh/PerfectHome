<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$rentreqid=$_SESSION["rentreqid"];
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
  <table width="200" border="1">
  <?php
$selQry = "select * from tbl_rentrequest r inner join tbl_user u inner join tbl_place p inner join tbl_district d where rentreq_id='".$rentreqid."' AND r.user_id=u.user_id AND u.place_id=p.place_id AND p.dist_id=d.dist_id";

$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
   ?>
    <tr>
      <td colspan="2"><img src="../Assets/Files/User/<?php echo $data["user_photo"]; ?>" width="120" height="120"></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"]; ?></td>
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
      <td>Contact No</td>
      <td><?php echo $data["user_contact"]; ?></td>
    </tr>
    <tr>
      <td>Alternate Contact No</td>
      <td><?php echo $data["rentreq_contact"]; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"]; ?></td>
    </tr>
    <tr>
      <td>ID Proof</td>
      <td><p><a href="../Assets/Files/User/<?php echo $data["rentreq_proof"]; ?>">View</a></p></td>
    </tr>
    <?php
  }
  ?>
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>