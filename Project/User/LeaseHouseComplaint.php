<?php

include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$leaseholderid=$_SESSION["leaseholderid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_sent"]))
{
	$type=$_POST["txt_type"];
	$discription=$_POST["txt_discription"];
	
	$insertqry="INSERT INTO tbl_complaint(complaint_type,complaint_discription,leaseholder_id)VALUES('".$type."','".$discription."','".$leaseholderid."')";
	
	 if($conn->query($insertqry))
  {
    ?>
        <script>
    alert("INSERTED");
    window.location="LeaseHouseComplaint.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="LeaseHouseComplaint.php";
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
<div class="site-section site-section-sm bg-light">
<div class="container">
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1">
    <tr>
      <td>Complaint Type</td>
      <td><label for="txt_subject"></label>
        <label for="txt_type"></label>
        <select name="txt_type" id="txt_type" required>
<option value="0">---Select---</option>
<option value="1">Complaint About House</option>
<option value="2">Complaint About Owner</option>
        </select></td>
    </tr>
    <tr>
      <td>Complaint</td>
      <td><label for="txt_discription"></label>
      <textarea name="txt_discription" id="txt_discription" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><br>
        <input type="submit" name="btn_sent" id="btn_sent" value="Submit" />
        
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>Reply</p>
  <section class="ftco">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
    <tr>
      <th scope="col">SI NO</th>
      <th scope="col">Complaint</th>
      <th scope="col">Complaint Type</th>
      <th scope="col">Complaint Reply</th>
    </tr>
    </thead>
    <tbody>
      <?php
	$selectqry="select * from tbl_complaint where leaseholder_id='".$leaseholderid."'";
	$row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_discription"]; ?></td>
      <td><?php if($data["complaint_type"]==1)
	  {echo "Complaint about House"; }
	  else
	  {echo "complaint about owner";}?></td>
      <td><?php echo $data["complaint_reply"]; ?></td>
    </tr>
    <?php
  }
  ?>
  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
  <p>&nbsp;</p>
</form>
</center>
</div>
</div>
</body>
</html><?php

include("footer.php");
?>