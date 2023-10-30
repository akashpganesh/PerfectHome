<?php

    include("../Assets/Connection/connection.php");
	session_start();
    $userid=$_SESSION["lgid"];
    $renterid=$_SESSION["renterid"];
    $rentid= $_SESSION["rentid"];
    include("../Assets/SessionValidator.php");
	$no=rand();
	$d=date('Y-m-d'); 
	$sel="select * from tbl_user where user_id='".$_SESSION["lgid"]."'";
	$row=$conn->query($sel);
	$data=$row->fetch_assoc();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Kosaksipasapse.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container bootstrap snippets bootdeys">
<div class="row" id="pri">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
			<div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
		    <div class="row" >

				<div class="col-sm-6 top-left">
					<i class="fa fa-rocket"></i>
				</div>

				<div class="col-sm-6 top-right">
						<h3 class="marginright">INVOICE-<?php echo $no?></h3>
						<span class="marginright"><?php echo $d?></span>
			    </div>

			</div>
			<hr>
			<div class="row">
				<?php
				$selQry="select * from tbl_renter r inner join tbl_house h inner join tbl_owner o where r.house_id=h.house_id AND h.owner_id=o.owner_id AND renter_id='".$renterid."' ";
				$row1=$conn->query($selQry);
				if($data1=$row1->fetch_assoc())
				{

				
				?>

				<div class="col-xs-4 from">
					<p class="lead marginbottom">From :<?php echo $data1["owner_name"];?></p>
	
				
					<p>Phone: <?php echo $data1["owner_contact"];?></p>
					<p>Email: <?php echo $data1["owner_email"];?></p>
				</div>
			
				<div class="col-xs-4 to">
					<p class="lead marginbottom">To : <?php echo $data["user_name"]?></p>
					
					
					<p>Phone: <?php echo $data["user_contact"]?></p>
					<p>Email: <?php echo $data["user_email"]?></p>

			    </div>

			    <div class="col-xs-4 to">
					<p class="lead marginbottom">House : <?php echo $data1["house_name"]?></p>
					<p>Address: <?php echo $data1["house_address"]?></p>
					
			    </div>

			</div>
                <?php
					}
					?>

			<div class="row table-row">
				<table class="table table-striped">
			      <thead>
			        <tr>
			          <th class="text-center" style="width:10%">#</th>

			          <th class="text-right" style="width:30%">Month</th>
			          <th class="text-right" style="width:30%">Amount</th>
			        </tr>
			      </thead>
			      <tbody>
					<?php
                    $i=0;
					 $selectqry="SELECT * FROM tbl_rent where rent_id='".$rentid."'";
							
					$rows=$conn->query($selectqry);
					$dats=$rows->fetch_assoc();
					    
                        $m1=$dats["rent_date"];
                        $month=date('m',strtotime($m1));
                        $year=date('Y',strtotime($m1));
                        
                        setlocale(LC_TIME,'fr_FR.UTF-8');
                        $j=$dats["rent_months"]-1;
                        while($j>=0){
                            $i++;
                            $m2=$month-$j;
                            if($m2>0){
                                $y=date($year);
                            }else{
                                $y=date($year)-1;
                            }
					?>
			        <tr>
			          <td class="text-center"><?php echo $i?></td>
			          <td class="text-right"><?php echo strftime('%B',mktime(0,0,0,$m2)); echo ","; echo $y; ?></td>
			          <td class="text-right"><?php echo $dats["rent_amount"]/$dats["rent_months"]; ?></td>
					</tr>
			       <?php
                   $j--;
                  }
				   ?>
                   <tr>
			          <td class="text-center"></td>
			          <td class="text-right">Total</td>
			          <td class="text-right"><?php echo $dats["rent_amount"]; ?></td>
					</tr>
			       </tbody>
			    </table>

			</div> 

			<div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="invoice-print" onclick="printDiv('pri')"><i class="fa fa-print"></i> Print Invoice</button>
				
			</div>
			<div class="col-xs-6 text-right pull-right invoice-total">
					  
			          
			</div>
			</div>

		  </div>
		</div>
	</div>
</div>
</div>

<style type="text/css">
body{margin-top:20px;
background:#eee;
}

/Invoice/
.invoice .top-left {
    font-size:65px;
	color:#3ba0ff;
}

.invoice .top-right {
	text-align:right;
	padding-right:20px;
}

.invoice .table-row {
	margin-left:-15px;
	margin-right:-15px;
	margin-top:25px;
}

.invoice .payment-info {
	font-weight:500;
}

.invoice .table-row .table>thead {
	border-top:1px solid #ddd;
}

.invoice .table-row .table>thead>tr>th {
	border-bottom:none;
}

.invoice .table>tbody>tr>td {
	padding:8px 20px;
}

.invoice .invoice-total {
	margin-right:-10px;
	font-size:16px;
}

.invoice .last-row {
	border-bottom:1px solid #ddd;
}

.invoice-ribbon {
	width:85px;
	height:88px;
	overflow:hidden;
	position:absolute;
	top:-1px;
	right:14px;
}

.ribbon-inner {
	text-align:center;
	-webkit-transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-ms-transform:rotate(45deg);
	-o-transform:rotate(45deg);
	position:relative;
	padding:7px 0;
	left:-5px;
	top:11px;
	width:120px;
	background-color:#66c591;
	font-size:15px;
	color:#fff;
}

.ribbon-inner:before,.ribbon-inner:after {
	content:"";
	position:absolute;
}

.ribbon-inner:before {
	left:0;
}

.ribbon-inner:after {
	right:0;
}

@media(max-width:575px) {
	.invoice .top-left,.invoice .top-right,.invoice .payment-details {
		text-align:center;
	}

	.invoice .from,.invoice .to,.invoice .payment-details {
		float:none;
		width:100%;
		text-align:center;
		margin-bottom:25px;
	}

	.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
		font-size:22px;
	}

	.invoice .btn {
		margin-top:10px;
	}
}

@media print {
	.invoice {
		width:900px;
		height:800px;
	}
}
</style>

<script type="text/javascript">

</script>
</body>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>