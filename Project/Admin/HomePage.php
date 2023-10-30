<?php
include("../Assets/Connection/Connection.php");

session_start();
$userid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["aid"]))
{
	$house_id=$_GET["aid"];
	$updateqry="update tbl_house set house_status=1 where house_id='".$house_id."'";
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Accepted");
    window.location="HomePage.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="HomePage.php";
    </script>
        <?php
  }
}

if(isset($_GET["rid"]))
{
	$house_id=$_GET["rid"];
	$updateqry="update tbl_house set house_status=2 where house_id='".$house_id."'";
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Rejected");
    window.location="HomePage.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="HomePage.php";
    </script>
        <?php
  }
}


if(isset($_GET["laid"]))
{
	$lease_id=$_GET["laid"];
	$updateqry="update tbl_lease set lease_status=1 where lease_id='".$lease_id."'";
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Accepted");
    window.location="HomePage.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="HomePage.php";
    </script>
        <?php
  }
}

if(isset($_GET["lrid"]))
{
	$lease_id=$_GET["lrid"];
	$updateqry="update tbl_lease set lease_status=2 where lease_id='".$lease_id."'";
	if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Rejected");
    window.location="HomePage.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="HomePage.php";
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

<style type="text/css">
.p {
	font-family: Comic Sans MS, cursive;
}
</style>
</head>

<body><?php
include("header.php");
?>
<center>

<form id="form1" name="form1" method="post" action="">
<section class="section">
                    <div class="card">
                        <div class="card-header"><b>Recent Rent Houses</b>
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
    <tr>
      <th><div align="center">SI NO</div></th>
      <th><div align="center">Image</div></th>
      <th><div align="center">House Name</div></th>
      <th><div align="center">Owner Name</div></th>
      <th colspan="2"><div align="center">Status</div></th>
      <th><div align="center"></div></th>
    </tr>
</thead>
<tbody>
    <?php
    $selectqry="select * from tbl_house h inner join tbl_owner o where h.owner_id=o.owner_id and house_status=0";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><div align="center"><?php echo $i; ?></div></td>
      <td><div align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></div></td>
      <td><div align="center"><?php echo $data["house_name"]; ?></div></td>
      <td><div align="center"><?php echo $data["owner_name"]; ?></div></td>
      <td><?php if($data["house_status"]==3){
		  echo "";
	  }else{
		  ?>
      <div align="center"><a href="HomePage.php?aid=<?php echo $data["house_id"];?>"><span class="badge bg-success">Accept</span></a><br /><br>
        <a href="HomePage.php?rid=<?php echo $data["house_id"];?>"><span class="badge bg-danger">Reject</span></a></div>
        <?php
	  } ?></td>
      <td><div align="center"><?php
	  if($data["house_status"]==1||$data["house_status"]==3){
	  ?>Accepted <?php }else if($data["house_status"]==2){
		  ?>Rejected <?php }
	  ?></div></td>
      <td><div align="center"><a href="RentHousesList.php?oid=<?php echo $data["house_id"];?>">View More...</a></div></td>
    </tr>
    <?php
  }
  ?>
  </tbody>
  </table>
  </div>
                    </div>

                </section>




                <section class="section">
                    <div class="card">
                        <div class="card-header"><b>Recent Lease Houses</b>
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
  $selectqry="select * from tbl_lease l inner join tbl_owner o where l.owner_id=o.owner_id and lease_status=0";
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
      <div align="center"><a href="HomePage.php?laid=<?php echo $data["lease_id"];?>"><span class="badge bg-success">Accept</span></a><br /><br>
        <a href="HomePage.php?lrid=<?php echo $data["lease_id"];?>"><span class="badge bg-danger">Reject</span></a></div>
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
</html><?php

include("footer.php");
?>