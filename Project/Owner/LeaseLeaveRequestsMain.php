<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_accept"]))
{
	$updateqry="update tbl_house set house_status=1,house_rentpayment=0 where house_id='".$_POST["leaseid"]."'";
	$updateqry2="update tbl_renter set renter_status=1 where renter_id='".$POST["leaseholderid"]."'";
	$updateqry3="update tbl_rentrequest set rentreq_status3=0 where house_id='".$_POST["leaseid"]."'"; 
	 if($conn->query($updateqry)&&$conn->query($updateqry2)&&$conn->query($updateqry3))
  {
    ?>
        <script>
    alert("Accepted");
    window.location="RentDisplay.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentDisplay.php";
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
    <td>House Name</td>
    <td>Renter Name</td>
      <td>Reason For Leaving</td>
      <td></td>
      </tr>
      </thead>
                                <tbody>
<?php
$selectqry="select * from tbl_leaverequest r inner join tbl_leaseholder h inner join tbl_lease l,tbl_user u where r.leaseholder_id=h.leaseholder_id and h.lease_id=l.lease_id and h.user_id=u.user_id and h.leaseholder_status=0";
 $row=$conn->query($selectqry);
 $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
?>
<form id="form1" name="form1" method="post" action="">
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $data["lease_name"]; ?></td>
  <td><?php echo $data["user_name"]; ?></td>
        <td><?php echo $data["leavereq_reason"]; ?></td>
        <input type="hidden" name="leavereqid" id="leavereqid" value="<?php echo $data["leavereq_id"]; ?>" />
        <input type="hidden" name="leaseid" id="leaseid" value="<?php echo $data["lease_id"]; ?>" />
        <input type="hidden" name="leaseholderid" id="leaseholderid" value="<?php echo $data["leaseholder_id"]; ?>" />
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

</body>
</html><?php

include("footer.php");
?>