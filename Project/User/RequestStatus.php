<?php

include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	$house_id=$_GET["oid"];
  $_SESSION["houseid"]=$house_id;
			
			header("location:RentPayment.php");
	
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
      <th><div align="center">SI No</div></th>
      <th><div align="center">Image</div></th>
      <th><div align="center">House Name</div></th>
      <th><div align="center">Status</div></th>
      <th><div align="center">Payment</div></th>
    </tr>
    </thead>
						  <tbody>
    <?php
    $selQry="select*from tbl_rentrequest r inner join tbl_house h where r.house_id=h.house_id AND user_id='".$userid."' and rentreq_status2=0";
	$row=$conn->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></td>
      <td><?php echo $data["house_name"];?></td>
      <td><?php
      if($data["rentreq_status"]==1)
    echo "Accepted";
    else if($data["rentreq_status"]==2)
    echo "Rejected";
	else
		echo "Processing";
    ?></td>
      <td><?php
      if($data["rentreq_status"]==1)
	  {
		  ?>
      <a href="RequestStatus.php?oid=<?php echo $data["house_id"];?>">Pay</a></td>
      <?php
	  }
	  ?>
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