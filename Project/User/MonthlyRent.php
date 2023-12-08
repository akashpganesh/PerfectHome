<?php
include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$renterid=$_SESSION["renterid"];
include("../Assets/SessionValidator.php");
$month=date('M');
$year=date('Y');

if(isset($_GET["oid"]))
{
	$rent_id=$_GET["oid"];
  $_SESSION["rentid"]=$rent_id;
			
			header("location:invoice.php");
	
}

if(isset($_POST["btn_pay"]))
{	
$comment=$_POST["txt_comment"];
$_SESSION["comment"]=$comment;
header("location:RentPaymentGateway.php");
}

$selectqry="select * from tbl_agreement where renter_id='".$renterid."'";
$row=$conn->query($selectqry);
  if($data=$row->fetch_assoc())
  {
	  $fdate=$data["agreement_fromdate"];
	  $tdate=date('Y-m-d');
  }
  
  $date_diff=abs(strtotime($tdate)-strtotime($fdate));
$years=floor($date_diff/(365*60*60*24));
$months=floor(($date_diff-$years*365*60*60*24)/(30*60*60*24));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../Assets/Templates/Table/css/style.css">
<style>
.disabled{
	opacity: 0.6;
	cursor: not-allowed;
  display: block;
  width: 50%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 5px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 50px;
}
table{
	border: none;
}
input[type=text],input[type=email],input[type=number],input[type=password],input[type=file],select,textarea{
	width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  border-color: #3f6;
}
.pay{
	display: block;
  width: 50%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 5px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 50px;
}
.pay:hover{
	 background-color: #9FC;
  color: black;
}
</style>
</head>

<body>
<?php

include("header.php");
?>
<br /><br /><br /><br /><br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
<?php
$selqry="select*from tbl_renter r inner join tbl_house h where r.house_id=h.house_id AND renter_id='".$renterid."'";
 $row=$conn->query($selqry);
  if($data=$row->fetch_assoc())
  {
	  if($data["house_rentpayment"]==$months+1)
  { $pending=0;}
  else if($data["house_rentpayment"]==$months)
  {$pending=1;}
  else if($data["house_rentpayment"]<$months){
	  $pending=($months-$data["house_rentpayment"])+1;}
  
  
?>
  <table width="500" border="1">
    <tr>
      <td>Rent Amount</td>
      <td><?php $amount=$data["house_price"]*$pending;
	  echo $amount; 
	  $_SESSION["amount"]=$amount; ?></td>
    </tr>
    <tr>
      <td>Rent Per Month</td>
      <td><?php echo $data["house_price"]; ?></td>
    </tr>
    <tr>
      <td>Comment</td>
      <td><label for="txt_comment"></label>
      <textarea name="txt_comment" id="txt_comment" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
      <?php
     /* $selqry="select * from tbl_rent where renter_id='".$renterid."' AND rent_month='".$month."' AND rent_year='".$year."'";
 $row=$conn->query($selqry);
 
  if($data=$row->fetch_assoc())
  {*/
	  if($data["house_rentpayment"]==$months+1)
  {
?>
       paid
       <?php }else if($data["house_rentpayment"]==$months){ ?>
        <input type="submit" name="btn_pay" id="btn_pay" value="Pay" class="pay"/>
        <?php
		$_SESSION["add"]=1;
  }
  else if($data["house_rentpayment"]<$months){
	  $pending=$months-$data["house_rentpayment"];
  ?>
  <br>
  <input type="submit" name="btn_pay" id="btn_pay" value="Pay" class="pay"/>
  <?php
  $_SESSION["add"]=$pending+1;
  echo $pending."months pending";
  }
  }
	  ?>
      </div></td>
    </tr>
  </table>
  <section class="ftco-section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
    <tr>
      <th scope="col">SI NO</th>
      <th scope="col">Payment Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Invoice</th>
    </tr>
    </thead>
						  <tbody>
    <?php
    $selQry1="select * from tbl_rent p inner join tbl_renter r where p.renter_id=r.renter_id and p.renter_id='".$renterid."'";
    $row2=$conn->query($selQry1);
    $i=0;
    while($data2=$row2->fetch_assoc())
   {
     $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data2["rent_date"]; ?></td>
      <td><?php echo $data2["rent_amount"]; ?></td>
      <td><a href="MonthlyRent.php?oid=<?php echo $data2["rent_id"];?>">Invoice</a></td>
    </tr>
    <?php
    }
    ?>
     </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</table>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>