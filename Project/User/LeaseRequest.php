<?php
include("../Assets/Connection/Connection.php");

session_start();

$userid=$_SESSION["lgid"];
$leaseid=$_SESSION["leaseid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_sent"]))
{
     
     $contact=$_POST["txt_contact"];
	 $fromdate=$_POST["txt_date"];
	 $years=$_POST["txt_years"];
	 $proof=$_FILES["file_proof"]["name"];
	 $path=$_FILES["file_proof"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Files/User/".$proof);
	 
    $insertqry="INSERT INTO tbl_leaserequest(lease_id,user_id,leasereq_contact,leasereq_proof,leasereq_fromdate,leasereq_year)VALUES('".$leaseid."','".$userid."','".$contact."','".$proof."','".$fromdate."','".$years."')";
	
	if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="LeaseRequest.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="LeaseRequest.php";
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
  <table width="450" border="1">
  <?php
$selQry = "select * from tbl_lease where lease_id='".$leaseid."'";
$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {

?>
    <tr>
      <td width="77" rowspan="4"><div align="center"><img src="../Assets/Files/House/<?php echo $data["lease_photo"]; ?>" width="120" height="120"></div></td>
      <td width="147">House Name : <?php echo $data["lease_name"]; ?></td>
    </tr>
    <tr>
      <td>Address : <?php echo $data["lease_address"]; ?></td>
    </tr>
    <tr>
      <td height="26">lease/Year : <?php echo $data["lease_amount"]; ?></td>
    </tr>
    <tr>
      <td height="26">Years : </td>
    </tr>
    <?php
  }
  ?>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
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
    <tr>
      <td>Years</td>
      <td><label for="txt_years"></label>
      
        <select name="txt_years" id="txt_years" required>
        <?php
      $selQry1 = "select * from tbl_lease where lease_id='".$leaseid."'";
$row1=$conn->query($selQry1);
  if($data1=$row1->fetch_assoc())
  {
	  $i=0;
	  while($data1["lease_maxyear"]>$i)
	  {
		  $i++;
  ?>
           <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
           <?php
	  }
  }
		   ?>
        </select></td>
    </tr>
    <?php
  }
  
  ?>
    <tr><td colspan="2">
    <?php
    $selectqry="select * from tbl_leaserequest where user_id='".$userid."' and lease_id='".$leaseid."' and leasereq_status3=1";
	 $row=$conn->query($selectqry);
  if($data=$row->fetch_assoc())
  {
	  echo "aldredy requested";
  }else{
	?>
      <input type="submit" name="btn_sent" id="btn_sent" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      <?php
  }
  ?></td>
    </tr>
  </table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>