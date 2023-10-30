<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_request"]))
{
	header("location:RentRequest.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
td,tr,table{
	border: none;
}
.button
{
	display: block;
  width: 40%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 50px;
}
.button:hover{
	  background-color: #9FC;
  color: black;
}
</style>
</head>
<body>
<p>
  <?php

include("header.php");
?>
  <br /><br /><br /><br /><br /><br />
<center>
  <form id="form1" name="form1" method="post" action="">
    <?php
$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND house_id='".$houseid."'";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {

?>

  <table width="42%" height="248" border="1" style="width:50%;float:left">
    <tr>
      <td><div align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="500" height="290"></div></td>
    </tr>
  </table>
  
  <table width="476" border="1" style="width:50%;float:left">
    <tr>
      <td colspan="2"><h1><?php echo $data["house_name"]; ?><h1></td>
      </tr>
    <tr>
      <td width="159">House Type</td>
      <td width="76"><?php echo $data["type_name"]; ?></td>
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
      <td>Rent /month</td>
      <td><?php echo $data["house_price"]; ?></td>
    </tr>
    <tr>
      <td>Security Amount</td>
      <td><?php echo $data["house_securityamount"]; ?></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        
      </div></td>
      
    </tr>
</table>
<br /><br /></br>
  <p>&nbsp;</p>
  
  </p>
  <br /><br />
  <h3>Gallery</h3>
  <table width="767" border="1">
  <tr>
  <?php
   $selQry1 = "select * from tbl_housegallary where house_id='".$houseid."'";
$row1=$conn->query($selQry1);
  $i=0;
  while($data1=$row1->fetch_assoc())
  {
    $i++;
	  ?>
      <td><p align="center"><img src="../Assets/Files/House/Gallary/<?php echo $data1["gallary_filename"]; ?>" width="320" height="180"></p>
        <p>&nbsp;</p>
        <p align="center" style="background-color:black;color:white;"><?php echo $data1["gallary_caption"]; ?></p></td>
    <?php
	if($i==4)
	{
		echo "</tr><tr>";
		
		$i=0;
	}
  }
  ?>
  </table>
  <table width="394" border="1">
    <tr>
      <td colspan="2"><h3>Owner Details</h3></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/Owner/<?php echo $data["owner_photo"]; ?>" width="120" height="120"></div></td>
    </tr>
    <tr>
      <td width="163">Name</td>
      <td width="24"><?php echo $data["owner_name"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["owner_contact"]; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["owner_email"]; ?></td>
    </tr>
  </table>
  
  <p>
    <?php
  }
  ?>
  <br />
  <p>
          <input type="submit" name="btn_request" id="btn_request" value="Send Request" class="button"/>
        </p>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>