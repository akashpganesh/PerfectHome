<?php
include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$renterid=$_SESSION["renterid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_send"]))
{
	$comment=$_POST["txt_comment"];
	
	$insertqry="insert into tbl_leaverequest(leavereq_reason,renter_id)values('".$comment."','".$renterid."')";
	 if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("Leave Requeated");
    window.location="RentHouseDetails.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentHouseDetails.php";
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
<style>
table{
	border: none;
}
input[type=text],input[type=email],input[type=number],input[type=password],input[type=file],select,textarea{
	width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  border-color: #3f6;
}
input[type=submit]{
	display: block;
  width: 50%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 5px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 50px;
}
input[type=submit]:hover{
	 background-color: #9FC;
  color: black;
}

</style>
</head>

<body><?php
include("header.php");
?>
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="544" height="245" border="1">
    <tr>
      <td>Reason For Leaving</td>
      <td><label for="txt_comment"></label>
      <textarea name="txt_comment" id="txt_comment" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_send" id="btn_send" value="Send Request" />
      </div></td>
    </tr>
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>