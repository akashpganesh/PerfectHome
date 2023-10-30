<?php
include("../Assets/Connection/connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_submit"]))
{
     $housename=$_POST["txt_housename"];
     $contact=$_POST["txt_contact"];
     $address=$_POST["txt_address"];
     $place=$_POST["txt_place"];
	 $price=$_POST["txt_price"];
	 $housetype=$_POST["txt_type"];
	 $landmark=$_POST["txt_landmark"];
	 $facilities=$_POST["txt_facilities"];
	 $secamount=$_POST["txt_secamount"];
	 $photo=$_FILES["file_photo"]["name"];
	 $path=$_FILES["file_photo"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/House/".$photo);
	 
	  $updateqry="UPDATE tbl_house SET house_name = '".$housename."',owner_id = '".$ownerid."',house_contact = '".$contact."',house_address = '".$address."',place_id = '".$place."',house_price = '".$price."',house_photo = '".$photo."',type_id = '".$housetype."',house_landmark = '".$landmark."',house_facilities = '".$facilities."',house_securityamount = '".$secamount."' WHERE house_id = '".$houseid."'";
	
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="EditRent.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="EditRent.php";
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

<center>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1">
  <?php
  $selectqry="select * from tbl_house where house_id='".$houseid."'";
  $row=$conn->query($selectqry);
   while($data=$row->fetch_assoc())
  {
	  ?>
  
    <tr>
      <td>House Name</td>
      <td><input type="text" name="txt_housename" id="txt_housename" value="<?php echo $data["house_name"]; ?>" required /></td>
    </tr>
    <tr>
    <?php
  }
  ?>
      <td>House Type</td>
      <td><select name="txt_type" id="txt_type" >
       <option value="">---select---</option>
      <?php
		$selQry="select*from tbl_housetype";
		$row=$conn->query($selQry);
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["type_id"];?>"><?php echo $data["type_name"];?></option>
            <?php
			}
			?>
            
      </select></td>
    </tr>
    <?php
    $selectqry="select * from tbl_house where house_id='".$houseid."'";
  $row=$conn->query($selectqry);
   while($data=$row->fetch_assoc())
  {
	  ?>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
        <textarea name="txt_address" id="txt_address" cols="45" rows="5" value="<?php echo $data["house_address"]; ?>" required ></textarea></td>
    </tr>
    <?php
  }
  ?>
    <tr>
      <td>District</td>
      <td><select name="txt_district" id="txt_district" onChange="getPlace(this.value)" required >
      <option value="">---select---</option>
        <?php
    $selectqry="select * from tbl_district";
    $row=$conn->query($selectqry);
    while($data=$row->fetch_assoc())
    {
      ?>
            <option value="<?php echo $data["dist_id"];?>"><?php echo $data["dist_name"];?></option>
            <?php
    }
    ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><select name="txt_place" id="txt_place" required >
       <option value="">---select---</option>
      </select></td>
    </tr>
    <?php
    $selectqry="select * from tbl_house where house_id='".$houseid."'";
  $row=$conn->query($selectqry);
   while($data=$row->fetch_assoc())
  {
	  ?>
    <tr>
      <td>Landmark</td>
      <td><input type="text" name="txt_landmark" id="txt_landmark" value="<?php echo $data["house_landmark"]; ?>" /></td>
    </tr>
    <tr>
      <td>Facilities</td>
      <td><textarea name="txt_facilities" id="txt_facilities" value="<?php echo $data["house_facilities"]; ?>" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Contact No</td>
      <td><input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["house_contact"]; ?>" required /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Rent /month</td>
      <td><input type="text" name="txt_price" id="txt_price" value="<?php echo $data["house_price"]; ?>" required /></td>
    </tr>
    <tr>
      <td>Security Amount</td>
      <td><input type="text" name="txt_secamount" id="txt_secamount" value="<?php echo $data["house_securityamount"]; ?>" required/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
    <?php
  }
  ?>
  </table>
</form>
</center>
</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(disid)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+disid,
	  success: function(html){
		$("#txt_place").html(html);
	  }
	});
}
</script>
</html><?php

include("footer.php");
?>