<?php

use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	$rentreq_id=$_GET["oid"];
  $_SESSION["rentreqid"]=$rentreq_id;
			
			header("location: ../Owner/RentRequestDetails.php");
	
}

if(isset($_POST["btn_acc"]))
{
  $selectqry="select * from tbl_rentrequest where rentreq_status=1 and house_id='".$houseid."'";
  $row=$conn->query($selectqry);
	if($data=$row->fetch_assoc())
	{
    ?>
        <script>
    alert("Aldredy Accepted");
    window.location="RentRequestList.php";
    </script>
        <?php
  }else{
  $updateqry="UPDATE tbl_rentrequest SET rentreq_status = 1 where rentreq_id='".$_POST["hidden_id"]."' ";
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
    $mail->Body = "Hello"." ".$_POST["hidden_name"]." "."Your Rent Request Accepted for the house"." ".$_POST["hidden_house"]." "." ";
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
    window.location="RentRequestList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentRequestList.php";
    </script>
        <?php
  }
}
}

if(isset($_POST["btn_rej"]))
{
  
  $updateqry="UPDATE tbl_rentrequest SET rentreq_status = 2 where rentreq_id='".$_POST["hidden_id"]."' ";
   if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Rejected");
    window.location="RentRequestList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentRequestList.php";
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
    <th width="28"><div align="center">SI NO</div></th>
    <th width="46"><div align="center">Name</div></th>
    <th width="57"><div align="center"></div></th>
    <th width="56" colspan="2"><div align="center">Status</div></th>
  </tr>
  </thead>
                                <tbody>
    <?php
	$selQry="select*from tbl_rentrequest r inner join tbl_user u,tbl_house h where r.user_id=u.user_id AND r.house_id=h.house_id AND r.house_id='".$houseid."'";
	$row=$conn->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <form id="form1" method="post" action="">
  <tr>
    <td><div align="center"><?php echo $i; ?></div></td>
    <td><div align="center"><?php echo $data["user_name"];?></div></td>
    <td><div align="center"><a href="RentRequestList.php?oid=<?php echo $data["rentreq_id"];?>">View Details</a></div></td>
    <input type="hidden" name="hidden_id" value="<?php echo $data["rentreq_id"]; ?>">
    <input type="hidden" name="hidden_name" value="<?php echo $data["user_name"]; ?>">
    <input type="hidden" name="hidden_house" value="<?php echo $data["house_name"]; ?>">
    <input type="hidden" name="hidden_email" value="<?php echo $data["user_email"]; ?>">
    <td width="56"><!--<p align="center"><a href="RentRequestList.php?aid=<?php echo $data["rentreq_id"];?>">Accept</a></p>
    <p align="center"><a href="RentRequestList.php?rid=<?php echo $data["rentreq_id"];?>">Reject</a></p>-->
    <p align="center"><input type="submit" name="btn_acc" id="btn_acc" value="Accept" />|<input type="submit" name="btn_rej" id="btn_rej" value="Reject" /></p>
  </td>
    <td width="62"><div align="center">
      <?php
      if($data["rentreq_status"]==1)
    echo "Accepted";
    if($data["rentreq_status"]==2)
    echo "Rejected";
    ?>
    </div></td>
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