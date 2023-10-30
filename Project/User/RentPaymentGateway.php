<?php
include("../Assets/Connection/Connection.php");
session_start();

$userid=$_SESSION["lgid"];
$renterid=$_SESSION["renterid"];
$rentcomment=$_SESSION["comment"];
$add=$_SESSION["add"];
$amount=$_SESSION["amount"];
include("../Assets/SessionValidator.php");
$month=date('M');
$year=date('Y');

$selectqry="SELECT * FROM tbl_renter r inner join tbl_house h where r.house_id=h.house_id and renter_id='".$renterid."'";
$row=$conn->query($selectqry);
  if($data=$row->fetch_assoc())
  {
	  $status=$data["house_rentpayment"];
	  $status2=$status+$add;
	  $houseid=$data["house_id"];
  }

if(isset($_POST["btnpay"]))
{
	$insertqry="INSERT INTO tbl_rent(rent_date,rent_comment,renter_id,rent_month,rent_year,rent_amount,rent_months)VALUES(curdate(),'".$rentcomment."','".$renterid."','".$month."','".$year."','".$amount."','".$add."')";
	$updateqry="UPDATE tbl_house SET house_rentpayment='".$status2."' where house_id='".$houseid."'";
	if($conn->query($insertqry)&&$conn->query($updateqry))
{
?>
<script>
alert("PAYMENT COMPLETED SUCCESFULLY");
window.location="MonthlyRent.php";
</script>
        <?php
}
else
{
?>
<script>
alert("PAYMENT COMPLETED SUCCESFULLY");
window.location="MonthlyRent.php";
</script>
        <?php
}

}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - payment checkout</title>
  <link rel="stylesheet" href="./style.css">
<style>
@import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Ubuntu', sans-serif;
}

body{
  background: #2196F3;
  margin: 0 10px;
}

.payment{
  background: #f8f8f8;
  max-width: 360px;
  margin: 80px auto;
  height: auto;
  padding: 35px;
  padding-top: 70px;
  border-radius: 5px;
  position: relative;
}

.payment h2{
  text-align: center;
  letter-spacing: 2px;
  margin-bottom: 40px;
  color: #0d3c61;
}

.form .label{
  display: block;
  color: #555555;
  margin-bottom: 6px;
}

.input{
  padding: 13px 0px 13px 25px;
  width: 100%;
  text-align: center;
  border: 2px solid #dddddd;
  border-radius: 5px;
  letter-spacing: 1px;
  word-spacing: 3px;
  outline: none;
  font-size: 16px;
  color: #555555;
}

.card-grp{
  display: flex;
  justify-content: space-between;
}

.card-item{
  width: 48%;
}

.space{
  margin-bottom: 20px;
}

.icon-relative{
  position: relative;
}

.icon-relative .fas,
.icon-relative .far{
  position: absolute;
  bottom: 12px;
  left: 15px;
  font-size: 20px;
  color: #555555;
}

.btn{
  margin-top: 40px;
  background: #2196F3;
  padding: 12px;
  text-align: center;
  color: #f8f8f8;
  border-radius: 5px;
  cursor: pointer;
}


.payment-logo{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  background: #f8f8f8;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
  text-align: center;
  line-height: 85px;
}

.payment-logo:before{
  content: "";
  position: absolute;
  top: 5px;
  left: 5px;
  width: 90px;
  height: 90px;
  background: #2196F3;
  border-radius: 50%;
}

.payment-logo p{
  position: relative;
  color: #f8f8f8;
  font-family: 'Baloo Bhaijaan', cursive;
  font-size: 58px;
}

input[type=submit] {
  background-color: #2196F3;
  border: none;
  color: #f8f8f8;
  font-size: 16px;
}

@media screen and (max-width: 420px){
  .card-grp{
    flex-direction: column;
  }
  .card-item{
    width: 100%;
    margin-bottom: 20px;
  }
  .btn{
    margin-top: 20px;
  }
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
<form method="post"  action="">
<div class="wrapper">
  <div class="payment">
    <div class="payment-logo">
      <p>p</p>
    </div>
    
    
    <h2>Payment Gateway</h2>
    <div class="form">
      <div class="card space icon-relative">
        <label class="label">Card holder:</label>
        <input type="text" class="input" placeholder="Card Holder" pattern="{a-zA-z}" required>
        <i class="fas fa-user"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number" required>
        <i class="far fa-credit-card"></i>
      </div>
      <div class="card-grp space">
        <div class="card-item icon-relative">
          <label class="label">Expiry date:</label>
          <input type="text" name="expiry-data" class="input" data-mask="00 / 00" placeholder="00 / 00" required>
          <i class="far fa-calendar-alt"></i>
        </div>
        <div class="card-item icon-relative">
          <label class="label">CVC:</label>
          <input type="text" class="input" data-mask="000" placeholder="000" required>
          <i class="fas fa-lock"></i>
        </div>
      </div>
        
      <div class="btn">
        <input type="submit" name="btnpay" id="btnpay" value="Pay">
      </div> 
      
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script><script  src="./script.js"></script>

</body>
</html>