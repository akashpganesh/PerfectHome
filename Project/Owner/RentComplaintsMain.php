<?php
include("../Assets/Connection/connection.php");

session_start();
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_reply"]))
{
  $_SESSION["complaintid"]=$_POST["complaintid"];
  $_SESSION["renterid"]=$_POST["renterid"];
			
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
      <td width="82">Renter Name</td>
      <td width="82">House Name</td>
      <td width="74">Reply</td>
    </tr>
    </thead>
                                <tbody>
     <?php
  $selectqry="select * from tbl_complaint c inner join tbl_renter r inner join tbl_user u,tbl_house h where c.renter_id=r.renter_id and r.user_id=u.user_id and r.house_id=h.house_id and r.renter_status=0 and complaint_type=1";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	  ?>
    <form id="form1" name="form1" method="post" action="">
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_discription"]; ?></td>
      <td><?php echo $data["user_name"]; ?></td>
      <td><?php echo $data["house_name"]; ?></td>
      <input type="hidden" name="complaintid" id="complaintid" value="<?php echo $data["complaint_id"]; ?>" />
      <input type="hidden" name="renterid" id="renterid" value="<?php echo $data["renter_id"]; ?>" />
      <td><!--<a href="HouseComplaints.php?rid=<?php echo $data["complaint_id"];?>">Reply</a>-->
      <input type="submit" name="btn_reply" id="btn_reply" value="Reply" /></td>
    </tr>
  </form>
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