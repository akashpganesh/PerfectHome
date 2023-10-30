<?php
include("../Assets/Connection/connection.php");

session_start();
 $userid=$_SESSION["lgid"];
 $leaseholderid=$_SESSION["leaseholderid"];
 include("../Assets/SessionValidator.php");
 
 if(isset($_POST["btn_submit"]))
{
  
  $subject=$_POST["txt_subject"];
  $discription=$_POST["txt_discription"];
  
  $insertqry="INSERT INTO tbl_feedback(feedback_subject,feedback_discription,leaseholder_id)VALUES('".$subject."','".$discription."','".$leaseholderid."')";
  
   if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="RentFeedback.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentFeedback.php";
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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td><p>Subject</p></td>
      <td><label for="txt_subject"></label>
      <input type="text" name="txt_subject" id="txt_subject" /></td>
    </tr>
    <tr>
      <td>Discription</td>
      <td><label for="txt_discription"></label>
      <textarea name="txt_discription" id="txt_discription" cols="45" rows="5"></textarea></td>
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