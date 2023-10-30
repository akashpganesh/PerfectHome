<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_save"]))
{
	$photo=$_FILES["file_photo"]["name"];
	 $path=$_FILES["file_photo"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/House/Gallary/".$photo);
	 $caption=$_POST["txt_caption"];
	 
	 $insertqry="INSERT INTO tbl_housegallary(gallary_caption,gallary_filename,house_id)VALUES('".$caption."','".$photo."','".$houseid."')";
	
	if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="RentDisplay.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentDisplay.php";
    </script>
        <?php
  }
  
}
	 
	 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rent Display</title>
</head>

<body><?php
include("header.php");
?>
<br /><br /><br /><br /><br /><br />
<center>
<table width="480" height="605" border="1">
<?php
$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_place p inner join tbl_district d where house_id='".$houseid."' AND h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
?>
  <tr>
    <td colspan="2"><div align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></div></td>
  </tr>
  <tr>
    <td width="201">House Name </td>
    <td width="189"><?php echo $data["house_name"]; ?></td>
  </tr>
  <tr>
    <td>House Type</td>
    <td><?php echo $data["type_name"]; ?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $data["house_address"]; ?></td>
  </tr>
  <tr>
    <td>District</td>
    <td><?php echo $data["dist_name"]; ?></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><?php echo $data["place_name"]; ?></td>
  </tr>
  <tr>
    <td>Landmark</td>
    <td><?php echo $data["house_landmark"]; ?></td>
  </tr>
  <tr>
    <td>Facilities</td>
    <td><?php echo $data["house_facilities"]; ?></td>
  </tr>
  <tr>
    <td>Contact No</td>
    <td><?php echo $data["house_contact"]; ?></td>
  </tr>
  <tr>
    <td>Rent /month</td>
    <td><?php echo $data["house_price"]; ?></td>
  </tr>
  <tr>
    <td>Security Display</td>
    <td><?php echo $data["house_securityamount"]; ?></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <p><a href="EditRent.php">Edit</a> | <a href="RentRequestList.php">View Requests</a></p>
      <?php
	  if($data["house_status"]==3)
	  {
		  ?>
      <p><a href="RenterDetails.php">Renter Details</a></p>
      <?php
	  }
	  ?>
    </div></td>
    </tr>
  <?php
  }
  ?>
</table>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td colspan="2">Add More Images</td>
      </tr>
    <tr>
      <td>Image</td>
      <td><label for="txt_photo"></label>
        <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Caption</td>
      <td><label for="txt_caption"></label>
        <input type="text" name="txt_caption" id="txt_caption" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
      </tr>
    <tr>
      <td colspan="2"><div align="center"><a href="RentGallary.php">View Gallary</a></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</center>
</body>
</html><?php

include("footer.php");
?>