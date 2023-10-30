<?php

include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

$updateqry="UPDATE tbl_rentrequest SET rentreq_status2 = 1 where user_id='".$userid."' AND house_id='".$houseid."' ";
$updateqry2="UPDATE tbl_house SET house_status = 1 where house_id='".$houseid."'";
$insertqry="INSERT INTO tbl_renter(user_id,house_id)VALUES('".$userid."','".$houseid."')"

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
if($conn->query($updateqry)&&$conn->query($updateqry2)&&$conn->query($insertqry))
  {
    ?>
    <p>Payment Completed Succesfully</p>
    <?php
  }
  else
  {
    ?>
        <p>Payment Failed</p>
        <?php
  }
   ?>
   
<body>
</body>
</html>