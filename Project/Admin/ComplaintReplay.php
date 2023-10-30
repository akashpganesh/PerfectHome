<?php
include("../Assets/Connection/connection.php");

session_start();

$complaintid=$_SESSION["complaintid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_submit"]))
{
$replay=$_POST["txt_replay"];
$updateqry="UPDATE tbl_complaint SET complaint_reply='".$replay."' where complaint_id='".$complaintid."'";

if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="ComplaintReplay.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="ComplaintReplay.php";
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

<body>
<?php
include("header.php");
?>

<center>
<form id="form1" name="form1" method="post" action="">
  <table width="598" height="253" border="1">
    <tr>
      <td>Replay</td>
      <td><label for="txt_replay"></label>
      <textarea name="txt_replay" id="txt_replay" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>