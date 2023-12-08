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

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
  
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../Assets/Templates/User/assets/img/favicon.png" rel="icon">
  <link href="../Assets/Templates/User/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Assets/Templates/User/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../Assets/Templates/User/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Assets/Templates/User/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Assets/Templates/User/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Assets/Templates/User/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.9.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
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
    
</head>

<body>
<?php

include("header.php");
?><br /><br /><br /><br /><br /><br />
<center>
<div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" style="margin-top: -100px;" method="post">
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">District</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="txt_district" id="txt_district" class="form-control d-block rounded-0" onChange="getPlace(this.value)">
                    <option value="">---select---</option>
                    <?php
    $selectqry="select * from tbl_district";
    $row=$conn->query($selectqry);
    while($data=$row->fetch_assoc())
    {
      ?>
            <option value="<?php echo $data["dist_id"];?>"><?php echo $data["dist_name"];?></option>
            <?php
    }
    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer-types">Place</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="txt_place" id="txt_place" class="form-control d-block rounded-0">
                    <option value="">---select---</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select-city">House Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="txt_type" id="txt_type" class="form-control d-block rounded-0">
                    <option value="">---select---</option>
                    <?php
		$selQry="select*from tbl_housetype";
		$row=$conn->query($selQry);
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["type_id"];?>"><?php echo $data["type_name"];?></option>
            <?php
			}
			?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search" name="btn_search">
              </div>
            </div>
          </form>
        </div>  
    

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="index.html" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>
                
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="#" class="view-list px-3 border-right active">All</a>
                  <a href="#" class="view-list px-3 border-right">Rent</a>
                  <a href="#" class="view-list px-3">Sale</a>
                </div>


                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select class="form-control form-control-sm d-block rounded-0">
                    <option value="">Sort by</option>
                    <option value="">Price Ascending</option>
                    <option value="">Price Descending</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
      
<!--<form id="form1" name="form1" method="post" action="RentSearch.php">
  <p>District : 
    <label for="txt_district"></label>
    <select name="txt_district" id="txt_district"  onChange="getPlace(this.value)" >
    <option value="">---select---</option>
        <?php
    $selectqry="select * from tbl_district";
    $row=$conn->query($selectqry);
    while($data=$row->fetch_assoc())
    {
      ?>
            <option value="<?php echo $data["dist_id"];?>"><?php echo $data["dist_name"];?></option>
            <?php
    }
    ?>
    </select>
    Place : 
    <label for="txt_place"></label>
    <select name="txt_place" id="txt_place">
    <option value="">---select---</option>
    </select> 
Type : 
<label for="txt_type"></label>
<select name="txt_type" id="txt_type">
 <option value="">---select---</option>
      <?php
		$selQry="select*from tbl_housetype";
		$row=$conn->query($selQry);
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["type_id"];?>"><?php echo $data["type_name"];?></option>
            <?php
			}
			?>
            
</select> 
<input type="submit" name="btn_search" id="btn_search" value="Search" />
  </p>
  <p>&nbsp;</p>
  <table width="523" height="172" border="1">
  <div id="search">
  <tr>
  <div class="row">-->
  <div class="row mb-5">
   <?php
   if(isset($_POST["btn_search"]))
{
	
     $district=$_POST["txt_district"];
     $place=$_POST["txt_place"];
     $type=$_POST["txt_type"];
if(!empty($district) && empty($place) && !empty($type))
{
	$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND p.dist_id='".$district."' AND h.type_id='".$type."'";
	
}else if(!empty($district) && !empty($place) && empty($type))
{
	$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND h.place_id='".$place."'";
}else if(!empty($district) && empty($place) && empty($type))
{
	$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND p.dist_id='".$district."'";
}else if(empty($district) && empty($place) && !empty($type))
{
	$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND h.type_id='".$type."'";
}else if(empty($district) && empty($place) && empty($type))
{
	$selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id";
}else
{
  $selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id AND h.place_id='".$place."' AND h.type_id='".$type."'";
  }
}else{
	  
	   $selQry = "select * from tbl_house h inner join tbl_housetype t,tbl_owner o,tbl_place p inner join tbl_district d where h.place_id=p.place_id AND p.dist_id=d.dist_id AND h.type_id=t.type_id AND h.owner_id=o.owner_id";
  }
$row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
	 /* ?>
      <td>
      <p align="center"><img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" width="120" height="120"></p>
        <p>House Name : <?php echo $data["house_name"]; ?></p>
      <p>Owner Name : <?php echo $data["owner_name"]; ?></p>
      <p>House Type : <?php echo $data["type_name"]; ?></p>
      <p>Place : <?php echo $data["place_name"]; ?></p>
      <p align="center"><a href="RentSearch.php?oid=<?php echo $data["house_id"];?>">open</a></p> </td>
    <?php
	if($i==4)
	{
		echo "</tr><tr>";
		
		$i=0;
	}
  }*/
  	
  ?>
 <!-- <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="RentSearch.php?oid=<?php echo $data["house_id"];?>"><?php echo $data["house_name"]; ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | <?php echo $data["house_price"];?></span>
                    </div>
                    <a href="RentSearch.php?oid=<?php echo $data["house_id"];?>" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
          
          <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
              <a href="RentSearch.php?oid=<?php echo $data["house_id"];?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <!--<span class="offer-type bg-danger">Sale</span>
                  <span class="offer-type bg-success">Rent</span>-->
                </div>
                <img src="../Assets/Files/House/<?php echo $data["house_photo"]; ?>" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                <h2 class="property-title"><a href="RentSearch.php?oid=<?php echo $data["house_id"];?>"><?php echo $data["house_name"]; ?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $data["house_address"];?></span>
                <strong class="property-price text-primary mb-3 d-block text-success">&#8377; <?php echo $data["house_price"];?></strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"> <?php echo $data["house_beds"]; ?><sup></sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?php echo $data["house_baths"]; ?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?php echo $data["house_area"]; ?></span>
                    
                  </li>
                </ul>

              </div>
              </div>
              </div>
              
         
 <?php
 if($i==3)
	{
		?>
        </div><div class="row mb-5">
		<?php
		$i=0;
	}
 }
 ?>
   
  </table>
  </div>
  <p>&nbsp; </p>
</form>
</center>
</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(disid)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+disid,
	  success: function(html){
		$("#txt_place").html(html);
	  }
	});
}

</script>
</html><?php

include("footer.php");
?>