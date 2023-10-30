<?php
include("../Assets/Connection/connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
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
<h1 align="center">MY HOUSES
</h1>
<p align="center">&nbsp;</p>
<p align="center"><a href="RentList.php">Rent</a></p>
<p align="center"><a href="LeaseList.php">Lease</a></p>
</body>
</html><?php

include("footer.php");
?>