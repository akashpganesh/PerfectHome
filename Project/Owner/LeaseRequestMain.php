<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	$leasereq_id=$_GET["oid"];
  $_SESSION["leasereqid"]=$leasereq_id;
			
			header("location:LeaseRequestDetails.php");
	
}

if(isset($_POST["btn_acc"]))
{
  $selectqry="select * from tbl_leaserequest where leasereq_status=1 and lease_id='".$_POST["hidden_leaseid"]."'";
  $row=$conn->query($selectqry);
	if($data=$row->fetch_assoc())
	{
    ?>
        <script>
    alert("Aldredy Accepted");
    window.location="LeaseRequestMain.php";
    </script>
        <?php
  }else{
  
  $updateqry="UPDATE tbl_leaserequest SET leasereq_status = 1 where leasereq_id='".$_POST["hidden_id"]."' ";
   if($conn->query($updateqry))
  {
    require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'perfecthome.rental.com@gmail.com'; // Your gmail
    $mail->Password = 'wcpcwfjqqgnvbwpa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('perfecthome.rental.com@gmail.com'); // Your gmail
  
    $mail->addAddress($_POST["hidden_email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Rent Request Accepted";
    $mail->Body = "Hello"." ".$_POST["hidden_name"]." "."Your Lease Request Accepted for the house"." ".$_POST["hidden_lease"]." "." ";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
    ?>
        <script>
    alert("Accepted");
    window.location="LeaseRequestMain.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="LeaseRequestMain.php";
    </script>
        <?php
  }
}
}

if(isset($_POST["btn_rej"]))
{
  
  $updateqry="UPDATE tbl_leaserequest SET leasereq_status = 2 where leasereq_id='".$_POST["hidden_id"]."' ";
   if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Rejected");
    window.location="LeaseRequestMain.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="LeaseRequestMain.php";
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
    <td width="50">SI NO</td>
    <td width="88">User Name</td>
    <td width="101">House Name</td>
    <td width="97">No of Years</td>
    <td width="105">View Details</td>
    <td colspan="2"><div align="center">Status</div></td>
  </tr>
  </thead>
                                <tbody>
    <?php
	$selQry="select*from tbl_leaserequest r inner join tbl_user u,tbl_lease l where r.user_id=u.user_id AND r.lease_id=l.lease_id AND l.owner_id='".$ownerid."'";
	$row=$conn->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <form id="form1" method="post" action="">
  <tr>
    <td align="center"><?php echo $i; ?></td>
    <td align="center"><?php echo $data["user_name"];?></td>
    <td align="center"><?php echo $data["lease_name"];?></td>
    <td align="center"><?php echo $data["leasereq_year"];?></td>
    <td align="center"><a href="LeaseRequestList.php?oid=<?php echo $data["leasereq_id"];?>">View Details</a></td>
    <input type="hidden" name="hidden_id" value="<?php echo $data["leasereq_id"]; ?>">
    <input type="hidden" name="hidden_leaseid" value="<?php echo $data["lease_id"]; ?>">
    <input type="hidden" name="hidden_email" value="<?php echo $data["user_email"]; ?>">
    <input type="hidden" name="hidden_lease" value="<?php echo $data["lease_name"]; ?>">
    <input type="hidden" name="hidden_name" value="<?php echo $data["user_name"]; ?>">
    <!--<td width="56"><p><a href="LeaseRequestList.php?aid=<?php echo $data["leasereq_id"];?>">Accept</a></p>
    <p><a href="LeaseRequestList.php?rid=<?php echo $data["leasereq_id"];?>">Reject</a></p></td>-->
    <td width="128"><p align="center"><input type="submit" name="btn_acc" id="btn_acc" value="Accept" />|<input type="submit" name="btn_rej" id="btn_rej" value="Reject" /></p></td>
    <td width="80" align="center"><?php
      if($data["leasereq_status"]==1)
    echo "Accepted";
    if($data["leasereq_status"]==2)
    echo "Rejected";
    ?></td>
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