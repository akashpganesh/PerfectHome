<?php
include("../Assets/Connection/Connection.php");

session_start();

$userid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_sent"]))
{
     
     $contact=$_POST["txt_contact"];
	 $fromdate=$_POST["txt_date"];
	 $proof=$_FILES["file_proof"]["name"];
	 $path=$_FILES["file_proof"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/User/".$proof);
	 
    $insertqry="INSERT INTO tbl_rentrequest(house_id,user_id,rentreq_contact,rentreq_proof,rentreq_fromdate)VALUES('".$houseid."','".$userid."','".$contact."','".$proof."','".$fromdate."')";
	
	if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="RentRequest.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentRequest.php";
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
  <table width="742" height="197" border="1">
  <?php
$selQry = "select * from tbl_house where house_id='".$houseid."'";
$row=$conn->query($selQry); 
  if($data=$row->fetch_assoc())
  {

?>
    <tr>
      <td width="77" rowspan="4"><div align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></div></td>
      <td width="147">House Name : <?php echo $data["house_name"]; ?></td>
    </tr>
    <tr>
      <td>Address : <?php echo $data["house_address"]; ?></td>
    </tr>
    <tr>
      <td>Security Amount : <?php echo $data["house_securityamount"]; ?></td>
    </tr>
    <tr>
      <td height="26">Rent/Month : <?php echo $data["house_price"]; ?></td>
    </tr>
    <?php
  }
  ?>
  </table>
  <p>&nbsp;</p>
  <table width="699" height="340" border="1">
   <?php
$selQry = "select * from tbl_user where user_id='".$userid."'";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {

?>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"]; ?></td>
    </tr>
    <tr>
      <td>Contact No</td>
      <td><?php echo $data["user_contact"]; ?></td>
    </tr>
    <tr>
      <td>Alternate Contact No:</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>ID Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" required/></td>
    </tr>
    <tr>
      <td>From Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" required/></td>
    </tr>
     <?php
  }
  ?>
    <tr>
      <td colspan="2">
      <?php
      $selQry = "select * from tbl_rentrequest where user_id='".$userid."' AND house_id='".$houseid."' and rentreq_status3=1";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
	  ?>
      Aldredy Requested
      <?php }else{ ?>
      <input type="submit" name="btn_sent" id="btn_sent" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
       <?php
  }
  ?>
  </td>
    </tr>
   
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>