<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$renterid=$_SESSION["renterid"];
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_send"]))
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
    $mail->Body = "Hello"." ".$_POST["hidden_name"]." "."please add the rent agreement for the house"." ".$_POST["hidden_house"]." "." ";
  if($mail->send())
  {
    ?>
    <script>
alert("sended");
window.location="RentHouseDetails.php";
</script>
    <?php
  }
  else
  {
    ?>
    <script>
alert("failed");
window.location="RentHouseDetails.php";
</script>
    <?php
  }
}

$selectqry="select * from tbl_agreement where renter_id='".$renterid."'";
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
<br /><br /><br /><br /><br /><br />
<center>
<?php
$row=$conn->query($selectqry);
	if($data=$row->fetch_assoc())
	{
		?>
<form id="form1" name="form1" method="post" action="">
  <table width="713" height="322" border="1">
    <?php
  $selQry = "select * from tbl_renter r inner join tbl_house h inner join tbl_owner o where r.house_id=h.house_id AND h.owner_id=o.owner_id AND renter_id='".$renterid."' ";
	 $row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
	  ?>
    <tr>
      <td colspan="2"><div align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120" align="middle" /></div></td>
    </tr>
    <tr>
      <td>House Name</td>
      <td><?php echo $data["house_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["house_address"]; ?></td>
    </tr>
    <tr>
      <td>Owner Name</td>
      <td><?php echo $data["owner_name"]; ?></td>
    </tr>
    <tr>
      <td colspan="2">View More...</td>
    </tr>
    <?php
  }
  ?>
  </table>
  <p>&nbsp;</p>
  <p><a href="MonthlyRent.php">Pay Rent</a> </p>
  <p><a href="HouseComplaint.php">Complaints</a>  </p>
  <p><a href="RentLeaveRequest.php">Leave From House</a></p>
  <p><a href="ViewRentAgreement.php">View Rent Agreement</a></p>
</form>
<?php
	}else{
	?>
    <form id="form1" name="form1" method="post" action="">
    <h3>Agreement is not added</h3>
    <?php
    $selQry1 = "select * from tbl_renter r inner join tbl_house h inner join tbl_owner o where r.house_id=h.house_id AND h.owner_id=o.owner_id AND renter_id='".$renterid."' ";
    $row1=$conn->query($selQry1);
  if($data1=$row1->fetch_assoc())
  {
    ?>
    <input type="hidden" name="hidden_name" value="<?php echo $data1["owner_name"]; ?>">
    <input type="hidden" name="hidden_house" value="<?php echo $data1["house_name"]; ?>">
    <input type="hidden" name="hidden_email" value="<?php echo $data1["owner_email"]; ?>">
    <input type="submit" name="btn_sent" id="btn_send" value="Send Request to the Owner" />
    <?php
  }
  ?>
    </form>
    <?php
	}
	?>
    
</center>
</body>
</html><?php

include("footer.php");
?>