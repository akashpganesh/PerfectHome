<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_notify"]))
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
  
    $mail->Subject = "Pending Payment";
    $mail->Body = "Hello"." ".$_POST["hidden_name"]." "."please pay the pending rent amount for the house"." ".$_POST["hidden_house"]." "." ";
  if($mail->send())
  {
    ?>
    <script>
alert("sended");
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
	font-family: Georgia, Times New Roman, Times, serif;
}
</style>
</head>

<body><?php
include("header.php");
?>
<form id="form1" name="form1" method="post" action="">
<section class="section">
                    <div class="card">
                        <div class="card-header"><b>Pending Rent Payments</b>
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
  <tr>
    <td>SI NO</td>
    <td>Renter Name</td>
    <td>House Name</td>
    <td>Pending</td>
    <td>Send Notification</td>
  </tr>
  </thead>
                                <tbody>
  <?php
  $selectqry="select * from tbl_agreement a inner join tbl_renter r inner join tbl_user u,tbl_house h where a.renter_id=r.renter_id and r.user_id=u.user_id and r.house_id=h.house_id and h.owner_id='".$ownerid."' and r.renter_status=0";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  $fdate=$data["agreement_fromdate"];
	  $tdate=date('Y-m-d');
	  
	   $date_diff=abs(strtotime($tdate)-strtotime($fdate));
$years=floor($date_diff/(365*60*60*24));
$months=floor(($date_diff-$years*365*60*60*24)/(30*60*60*24));
if($data["house_rentpayment"]<$months){
	$pending=$months-$data["house_rentpayment"];
  $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data["user_name"]; ?></td>
    <td><?php echo $data["house_name"]; ?></td>
    <td><?php echo $pending."months"; ?></td>
    <input type="hidden" name="hidden_name" value="<?php echo $data["user_name"]; ?>">
    <input type="hidden" name="hidden_email" value="<?php echo $data["user_email"]; ?>">
    <input type="hidden" name="house_name" value="<?php echo $data["house_name"]; ?>">
    <td><input type="submit" name="btn_notify" id="btn_notify" value="Send Notification" /></td>
  </tr>
  <?php
	  }
  }
  ?>
</tbody>
                            </table>
                        </div>
                    </div>

                </section>
</form>
</body>
</html><?php

include("footer.php");
?>