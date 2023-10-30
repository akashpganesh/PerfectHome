<?php
include("../Assets/Connection/Connection.php");
session_start();
$userid=$_SESSION["lgid"];

include("../Assets/SessionValidator.php");

if(isset($_GET["oid"]))
{
	$house_id=$_GET["oid"];
  $_SESSION["houseid"]=$house_id;
			
			header("location:RentDisplay.php");
	
}
if(isset($_GET["lid"]))
{
	$lease_id=$_GET["lid"];
  $_SESSION["leaseid"]=$lease_id;
			
			header("location:LeaseDisplay.php");
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="../Assets/Templates/User/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Assets/Templates/User/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/magnific-popup.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/jquery-ui.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/mediaelementplayer.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/animate.css">
    <link rel="stylesheet" href="../Assets/Templates/User/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../Assets/Templates/User/css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="../Assets/Templates/User/css/aos.css">

    <link rel="stylesheet" href="../Assets/Templates/User/css/style.css">
    
<style>
.btn{
	background-color: #3F6;
	border-radius: 4px;
	padding: 12px 16px;
	font-size: 16px;
	cursor: pointer;
}
.btn:hover{
	background-color: #09C;
}
</style>
</head>

<body>

  <?php

include("header.php");
?>
  <br>
<form id="form1" name="form1" method="post" action="">
<!-- ======= Intro Section ======= -->
 <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
    <?php
$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id and house_status=1";
$row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  if($i<3)
	  {
    $i++;
?>
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(../Assets/Files/House/<?php echo $data["house_photo"]; ?>)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?php echo $data["place_name"];
					    echo ",";
					    echo $data["dist_name"]; ?>
                      <br> <!--78345-->
                    </p>
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b"></span> <?php echo $data["house_name"]; ?>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="HomePage.php?oid=<?php echo $data["house_id"];?>"><span class="price-a">rent | &#8377;<?php echo $data["house_price"]; ?></span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
  }
  }
  ?>
</div>
    <div class="swiper-pagination"></div>
  </div><!-- End Intro Section -->
<center>
<div class="site-section site-section-sm bg-light">
      <div class="container">
<main id="main">
    <br><br>
    <h2 align="left"><b>&nbsp;&nbsp;For Rent</b></h2>
    <div class="row mb-5">
    <?php
    $selQry1 = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id and house_status=1";
$row1=$conn->query($selQry1);
  $i=0;
  while($data1=$row1->fetch_assoc())
  {
    $i++;
   if($i>3&&$i<=6)
   {
?>
<div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
              <a href="HomePage.php?oid=<?php echo $data1["house_id"];?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <!--<span class="offer-type bg-danger">Sale</span>-->
                  <span class="offer-type bg-success">Rent</span>
                </div>
                <img src="../Assets/Files/House/<?php echo $data1["house_photo"]; ?>" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="HomePage.php?oid=<?php echo $data1["house_id"];?>"><?php echo $data1["house_name"]; ?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $data1["house_address"];?></span>
                <strong class="property-price text-primary mb-3 d-block text-success"><?php echo $data1["house_price"];?></strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"><?php echo $data1["house_beds"]; ?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?php echo $data1["house_baths"]; ?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?php echo $data1["house_area"]; ?></span>
                    
                  </li>
                </ul>

              </div>
              </div>
              </div>
              <?php
  }
  }
  ?>

<main id="main">
    <br><br>
    <h2 align="left"><b>&nbsp;&nbsp;For Lease</b></h2>
    <div class="row mb-5">
    <?php
    $selQry2 = "select * from tbl_lease l inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where l.place_id=p.place_id AND p.dist_id=d.dist_id AND l.type_id=t.type_id AND l.owner_id=o.owner_id and lease_status=1";
$row2=$conn->query($selQry2);
  $i=0;
  while($data2=$row2->fetch_assoc())
  {
    
   if($i<3)
   $i++;
   {
?>
<div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
              <a href="HomePage.php?lid=<?php echo $data2["lease_id"];?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-danger">Lease</span>
                  <!--<span class="offer-type bg-success">Rent</span>-->
                </div>
                <img src="../Assets/Files/House/<?php echo $data2["lease_photo"]; ?>" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="RentSearch.php?oid=<?php echo $data2["lease_id"];?>"><?php echo $data2["lease_name"]; ?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $data2["lease_address"];?></span>
                <strong class="property-price text-primary mb-3 d-block text-success"><?php echo $data2["lease_amount"];?></strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"><?php echo $data2["lease_beds"]; ?></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?php echo $data2["lease_baths"]; ?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?php echo $data2["lease_cent"]; ?></span>
                    
                  </li>
                </ul>

              </div>
              </div>
              </div>
              <?php
  }
  }
  ?>
 </form>
</center>
</div>
</div>
</body>

</html><?php

include("footer.php");
?>