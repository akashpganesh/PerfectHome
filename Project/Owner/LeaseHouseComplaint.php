<?php
include("../Assets/Connection/connection.php");

session_start();

$leaseholderid=$_SESSION["leaseholderid"];
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
    <tr>
      <td>SI NO</td>
      <td>Subject</td>
      <td>Complaint</td>
    </tr>
     <?php
  $selectqry="select * from tbl_complaint where leaseholder_id='".$leaseholderid."' and complaint_status=1";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	  ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_subject"]; ?></td>
      <td><?php echo $data["complaint_discription"]; ?></td>
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