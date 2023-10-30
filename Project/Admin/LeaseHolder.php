<?php
include("../Assets/Connection/Connection.php");
session_start();
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
<form id="form1" name="form1" method="post" action="">
  <table width="841" border="1">
    <tr>
      <th>SI NO</th>
      <th>Lease Holder Name</th>
      <th>House Name</th>
      <th>Owner Name</th>
    </tr>
    <?php
  $selectqry="select * from tbl_leaseholder h inner join tbl_user u,tbl_lease l inner join tbl_owner o where h.user_id=u.user_id and h.lease_id=l.lease_id and l.owner_id=o.owner_id";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++
  ?>  
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["user_name"]; ?></td>
      <td><?php echo $data["lease_name"]; ?></td>
      <td><?php echo $data["owner_name"]; ?></td>
    </tr>
    <?php
  }
  ?>
  </table>
</form>
</body>
</center>
</html>