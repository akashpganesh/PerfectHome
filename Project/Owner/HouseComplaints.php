<?php
include("../Assets/Connection/connection.php");

session_start();

$renterid=$_SESSION["renterid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["rid"]))
{
	$complaint_id=$_GET["rid"];
  $_SESSION["complaintid"]=$complaint_id;
			
			header("location: ../Owner/ComplaintReplay.php");
	
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
      <td width="40">SI NO</td>
      <td width="82">Complaint</td>
      <td width="74">Reply</td>
    </tr>
    </thead>
                                <tbody>
     <?php
  $selectqry="select * from tbl_complaint where renter_id='".$renterid."' and complaint_type=1";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	  ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_discription"]; ?></td>
      <td><a href="HouseComplaints.php?rid=<?php echo $data["complaint_id"];?>">Reply</a></td>
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