<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_accept"]))
{
	$updateqry="update tbl_house set house_status=1,house_rentpayment=0 where house_id='".$_POST["houseid"]."'";
	$updateqry2="update tbl_renter set renter_status=1 where renter_id='".$_POST["renterid"]."'";
	$updateqry3="update tbl_rentrequest set rentreq_status3=0 where house_id='".$_POST["houseid"]."'"; 
	 if($conn->query($updateqry)&&$conn->query($updateqry2)&&$conn->query($updateqry3))
  {
    $_SESSION["houseid"]=$_POST["houseid"];
    ?>
        <script>
    alert("Accepted");
    window.location="RentLeaveRequestsMain.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentLeaveRequestsMain.php";
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
<form id="form2" name="form2" method="post" action="">
<center>
<section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
    <td>SI NO</td>
    <td>House Name</td>
    <td>Renter Name</td>
      <td>Reason For Leaving</td>
      <td></td>
      </tr>
      </thead>
        <tbody>
<?php
$selectqry="select * from tbl_leaverequest l inner join tbl_renter r inner join tbl_house h,tbl_user u where l.renter_id=r.renter_id and r.house_id=h.house_id and r.user_id=u.user_id and r.renter_status=0";
 $row=$conn->query($selectqry);
 $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
?>
<form id="form1" name="form1" method="post" action="">
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $data["house_name"]; ?></td>
  <td><?php echo $data["user_name"]; ?></td>
        <td><?php echo $data["leavereq_reason"]; ?></td>
        <input type="hidden" name="leavereqid" id="leavereqid" value="<?php echo $data["leavereq_id"]; ?>" />
        <input type="hidden" name="houseid" id="houseid" value="<?php echo $data["house_id"]; ?>" />
        <input type="hidden" name="renterid" id="renterid" value="<?php echo $data["renter_id"]; ?>" />
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_accept" id="btn_accept" value="Accept" />
      </div> </td>
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
  </center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br />
</form>
</body>
</html><?php

include("footer.php");
?>