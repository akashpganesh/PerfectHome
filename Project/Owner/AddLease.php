<?php
include("../Assets/Connection/connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_submit"]))
{
     $housename=$_POST["txt_name"];
    
     $address=$_POST["txt_address"];
     $place=$_POST["txt_place"];
	 $price=$_POST["txt_leaseamount"];
	 $advance=$_POST["txt_advance"];
	 $housetype=$_POST["txt_type"];
	 $beds=$_POST["txt_beds"];
	 $baths=$_POST["txt_baths"];
	 $landmark=$_POST["txt_landmark"];
	 $facilities=$_POST["txt_facilities"];
	 $maxyear=$_POST["txt_maxyear"];
	 $totarea=$_POST["txt_area"];
	  $contact=$_POST["txt_contact"];
	 $photo=$_FILES["file_photo"]["name"];
	 $path=$_FILES["file_photo"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/House/".$photo);
	 
	 $selectqry1="select * from tbl_lease where lease_name='".$housename."'";
  $row1=$conn->query($selectqry1);
  if($data1=$row1->fetch_assoc())
  {
	  ?>
        <script>
		alert("Aldredy Existed");
		window.location="AddLease.php";
		</script>
        <?php
  }
	  else
	  {
	 $insertqry="INSERT INTO tbl_lease(lease_name,owner_id,lease_address,place_id,lease_amount,lease_advance,lease_photo,type_id,lease_landmark,lease_facilities,lease_cent,lease_maxyear,lease_contact,lease_beds,lease_baths)VALUES('".$housename."','".$ownerid."','".$address."','".$place."','".$price."','".$advance."','".$photo."','".$housetype."','".$landmark."','".$facilities."','".$totarea."','".$maxyear."','".$contact."','".$beds."','".$baths."')";
	 
	 if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="AddLease.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="AddLease.php";
    </script>
        <?php
  }
  
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

<body>
<?php
include("header.php");
?>

<center>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1">
    <tr>
      <td width="62">House Name</td>
      <td width="395"><input type="text" name="txt_name" id="txt_name" required /></td>
    </tr>
    <tr>
      <td>House Type</td>
      <td><select name="txt_type" id="txt_type" required>
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
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required ></textarea></td>
    </tr>
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
    <tr>
      <td>Landmark</td>
      <td><input type="text" name="txt_landmark" id="txt_landmark" /></td>
    </tr>
    <tr>
      <td>No of BedRooms</td>
      <td><label for="txt_beds"></label>
        <input type="number" name="txt_beds" id="txt_beds" required/></td>
    </tr>
    <tr>
      <td>No of Bathrooms</td>
      <td><label for="txt_baths"></label>
        <input type="number" name="txt_baths" id="txt_baths" required/></td>
    </tr>
    <tr>
      <td>Facilities</td>
      <td><textarea name="txt_facilities" id="txt_facilities" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Contact No</td>
      <td><label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" required/></td>
    </tr>
    <tr>
      <td>Total Area</td>
      <td><input type="text" name="txt_area" id="txt_area" required/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id="file_photo" required/></td>
    </tr>
    <tr>
      <td>Lease Amount /Year</td>
      <td><input type="text" name="txt_leaseamount" id="txt_leaseamount" required /></td>
    </tr>
    <tr>
      <td>Advance Amount</td>
      <td><label for="txt_advance"></label>
        <input type="text" name="txt_advance" id="txt_advance" required/></td>
    </tr>
    <tr>
      <td>Max Year</td>
      <td><input type="text" name="txt_maxyear" id="txt_maxyear" required/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
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