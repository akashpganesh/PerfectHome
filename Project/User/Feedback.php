<?php
include("../Assets/Connection/connection.php");

session_start();
 $userid=$_SESSION["lgid"];
 include("../Assets/SessionValidator.php");
 
 if(isset($_POST["btn_submit"]))
{
  
  $subject=$_POST["txt_subject"];
  $discription=$_POST["txt_discription"];
  
  $insertqry="INSERT INTO tbl_feedback(feedback_subject,feedback_discription,user_id)VALUES('".$subject."','".$discription."','".$userid."')";
  
   if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="Feedback.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="Feedback.php";
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
.submit{
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
.submit:hover{
	 background-color: #9FC;
  color: black;
}

</style>
</head>

<body>
<?php

include("header.php");
?>
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1">
    <tr>
      <td><p>Subject</p></td>
      <td><label for="txt_subject"></label>
      <input type="text" name="txt_subject" id="txt_subject" required/></td>
    </tr>
    <tr>
      <td>Discription</td>
      <td><label for="txt_discription"></label>
      <textarea name="txt_discription" id="txt_discription" required cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><br>
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="submit" />
        
      </div></td>
    </tr>
  </table>
</form>
</center>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
</body>
</html>
<?php

include("footer.php");
?>