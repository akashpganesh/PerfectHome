<?php
include("../Assets/Connection/connection.php");

session_start();
include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	$lease_id=$_GET["oid"];
  $_SESSION["leaseid"]=$lease_id;
			
			header("location:LeaseDisplay.php");
	
}

if(isset($_GET["aid"]))
{
	$lease_id=$_GET["aid"];
	$updateqry="update tbl_lease set lease_status=1 where lease_id='".$lease_id."'";
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Accepted");
    window.location="LeaseList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="LeaseList.php";
    </script>
        <?php
  }
}

if(isset($_GET["rid"]))
{
	$lease_id=$_GET["rid"];
	$updateqry="update tbl_lease set lease_status=2 where lease_id='".$lease_id."'";
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Rejected");
    window.location="LeaseList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="LeaseList.php";
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

<body><?php
include("header.php");
?>

<center>
<form id="form1" name="form1" method="post" action="">
<section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
    <tr>
      <td>SI NO</td>
      <td>Image</td>
      <td>House Name</td>
      <td>Owner Name</td>
      <td colspan="2">Status</td>
      <td>&nbsp;</td>
    </tr>
    </thead>
                                <tbody>
      <?php
  $selectqry="select * from tbl_lease l inner join tbl_owner o where l.owner_id=o.owner_id";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
       <td><?php echo $i; ?></td>
      <td><img src="../Assets/Files/House/<?php echo $data["lease_photo"]; ?>" width="120" height="120"></td>
      <td><?php echo $data["lease_name"]; ?></td>
      <td><?php echo $data["owner_name"]; ?></td>
      <td><?php if($data["lease_status"]==3){
		  echo "";
	  }else{
		  ?>
      <div align="center"><a href="LeaseList.php?aid=<?php echo $data["lease_id"];?>"><span class="badge bg-success">Accept</span></a><br /><br>
        <a href="LeaseList.php?rid=<?php echo $data["lease_id"];?>"><span class="badge bg-danger">Reject</span></a></div>
        <?php
	  } ?></td>
      <td><div align="center"><?php
	  if($data["lease_status"]==1||$data["lease_status"]==3){
	  ?>Accepted <?php }else if($data["lease_status"]==2){
		  ?>Rejected <?php }
	  ?></div></td>
      <td><a href="LeaseList.php?oid=<?php echo $data["lease_id"];?>">View More...</a></td>
    </tr>
    <?php
  }
  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
</form>
</center>
</body>
<script src="../Assets/Templates/Admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</html><?php

include("footer.php");
?>