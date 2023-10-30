<?php
include("../Assets/Connection/connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	$lease_id=$_GET["oid"];
  $_SESSION["leaseid"]=$lease_id;
			
			header("location: ../Owner/LeaseDisplay.php");
	
}

if(isset($_GET["did"]))
{
  $delQry="delete from tbl_lease where lease_id='".$_GET["did"]."'";
  if($conn->query($delQry))
  {
    ?>
        <script>
    alert("Deleted");
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
  
    ?>
        <script>
    alert("Not Able to delete");
    window.location="LeaseList.php";
    </script>
        <?php
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
      <td width="99">SI NO</td>
      <td width="120">House Photo</td>
      <td width="306">House Name</td>
      <td width="195">View More..</td>
      <td width="106">Action</td>
    </tr>
    </thead>
                                <tbody>
    <?php
  $selectqry="select * from tbl_lease where owner_id='".$ownerid."' ";
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
      <td><a href="LeaseList.php?oid=<?php echo $data["lease_id"];?>">open</a></td>
      <td>
      <?php
	  if($data["lease_status"]==1)
	  {
		  ?>
      <a href="LeaseList.php?did=<?php echo $data["lease_id"];?>"><span class="badge bg-danger">Delete</span></a>
      <?php
	  }else{
      ?>
      <a href="RentList.php?rid=<?php echo $data["lease_id"];?>"><span class="badge bg-danger">Delete</span></a>
      <?php
    }
	  ?>
      </td>
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