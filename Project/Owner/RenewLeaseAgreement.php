<?php
include("../Assets/Connection/Connection.php");

session_start();

$houseid=$_SESSION["houseid"];
$leaseholderid=$_SESSION["leaseholder"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_submit"]))
{
	$agreement=$_FILES["file_agreement"]["name"];
	$path=$_FILES["file_agreement"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/House/".$agreement);
	 $fromdate=$_POST["txt_fromdate"];
	 $todate=$_POST["txt_todate"];
	 
	 $updateqry="UPDATE tbl_agreement SET agreement_file='".$agreement."',agreement_fromdate='".$fromdate."',agreement_todate='".$todate."' where leaseholder_id='".$leaseholderid."'";
	 if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="RenewLeaseAgreement.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RenewLeaseAgreement.php";
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
<br /><br /><br /><br /><br /><br />
<center>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Agreement</td>
      <td><label for="file_agreement"></label>
      <input type="file" name="file_agreement" id="file_agreement" required/></td>
    </tr>
    <tr>
      <td>From Date</td>
      <td><label for="txt_fromdate"></label>
      <input type="date" name="txt_fromdate" id="txt_fromdate" required/></td>
    </tr>
    <tr>
      <td>Expiring Date</td>
      <td><label for="txt_todate"></label>
      <input type="date" name="txt_todate" id="txt_todate" required/></td>
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