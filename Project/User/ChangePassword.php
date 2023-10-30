<?php
include("../Assets/Connection/connection.php");

session_start();

$userid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

 $selectqry="select * from tbl_user where user_id='".$userid."'"; 
	  $row=$conn->query($selectqry);
  if($data=$row->fetch_assoc())
  {
	  $pass=$data["user_password"];
  }

      if(isset($_POST["btn_update"]))
      {
		  $oldpassword=$_POST["txt_oldpassword"];
      $password=$_POST["txt_password"];
	    $password2=$_POST["txt_password2"];
	  if($oldpassword==$pass)
	  {
	  if($password==$password2)
	  {
	  $updateqry="UPDATE tbl_user SET user_password = '".$password."' WHERE user_id = '".$userid."' and user_password='".$oldpassword."'" ;
       
       
 if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("UPDATED");
    window.location="ChangePassword.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="ChangePassword.php";
    </script>
        <?php
  }
	  }else{
		  ?>
        <script>
    alert("Password Missmatch");
    window.location="ChangePassword.php";
    </script>
        <?php
	  }
	  }else{
		  ?>
        <script>
    alert("Enter Correct Password");
    window.location="ChangePassword.php";
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
  float:left;
}
input[type=submit]:hover{
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
  <table width="405" height="201" border="1">
    <tr>
      <td>Enter Old Password</td>
      <td><label for="txt_oldpassword"></label>
        <input type="password" name="txt_oldpassword" id="txt_oldpassword" required/></td>
    </tr>
    <tr>
      <td width="104">Enter New Password</td>
      <td width="193"><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required/></td>
    </tr>
    <tr>
      <td>Enter Password Again</td>
      <td><label for="txt_password2"></label>
        <input type="password" name="txt_password2" id="txt_password2" required/></td>
    </tr>
    <tr>
      <td height="57" colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</center>
</body>
</html>
<?php

include("footer.php");
?>