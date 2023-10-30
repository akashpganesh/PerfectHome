<?php

include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["vid"]))
{
	$leaseholder_id=$_GET["vid"];
  $_SESSION["leaseholderid"]=$leaseholder_id;
			
			header("location:LeaseHouseDetails.php");
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="../Assets/Templates/Table/css/style.css">
</head>

<body>
<?php

include("header.php");
?>
<div class="site-section site-section-sm bg-light">
      <div class="container">
<center>
<form id="form1" name="form1" method="post" action="">
<section class="ftco-section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
    <tr>
      <th>SI NO</th>
      <th>Image</th>
      <th>House Name</th>
      <th>View More...</th>
    </tr>
    </thead>
						  <tbody>
    <?php
    $selQry = "select * from tbl_leaseholder h inner join tbl_lease l where h.lease_id=l.lease_id AND user_id='".$userid."' and leaseholder_status=0";
	 $row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><img src="../Assets/Files/House/<?php echo $data["lease_photo"]; ?>" width="120" height="120"></td>
      <td><?php echo $data["lease_name"]; ?></td>
      <td><a href="LeaseHouses.php?vid=<?php echo $data["leaseholder_id"];?>">View More...</a></td>
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
</form>
</center>
</div>
</div>
</body>
</html><?php

include("footer.php");
?>