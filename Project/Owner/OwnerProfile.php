<?php

include("../Assets/Connection/Connection.php");
session_start();

$ownerid=$_SESSION["lgid"];
include("../Assets/SessionValidator.php");
   


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

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

<style>
table{
border: none;
}
img{
	border-radius: 50%;
}
</style>
</head>

<body><?php
include("header.php");
?>
<form id="form1" name="form1" method="post" action="">

<!--<table width="489" height="416" border="1">-->

<?php
$selQry = "select * from tbl_owner o inner join tbl_place p inner join tbl_district d where owner_id='".$ownerid."' AND o.place_id=p.place_id AND p.dist_id=d.dist_id";

$row=$conn->query($selQry);
  if($data=$row->fetch_assoc())
  {
   ?>
  <!--<tr>
    <td height="163" colspan="2"><div align="center"><img src="../Assets/Files/Owner/<?php echo $data["owner_photo"]; ?>" width="120" height="120"></div></td>
    </tr>
  <tr>
    <td width="158">Name</td>
    <td width="183"><?php echo $data["owner_name"]; ?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $data["owner_contact"]; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $data["owner_email"]; ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?php echo $data["owner_gender"]; ?></td>
  </tr>
  <tr>
    <td>District</td>
    <td><?php echo $data["dist_name"]; ?></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><?php echo $data["place_name"]; ?></td>
  </tr>-->


  <!-- ======= Intro Single ======= -->
<section class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $data["owner_name"]; ?></h1>
              <span class="color-text-a">Owner</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">Owner</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <?php echo $data["owner_name"]; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->
    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <div class="agent-avatar-box">
                  <img src="../Assets/Files/Owner/<?php echo $data["owner_photo"]; ?>" alt="" class="agent-avatar img-fluid" height=400 width=400>
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d"><?php echo $data["owner_name"]; ?>
                        <br> <!--Escala-->
                      </h3>
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                      
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"><?php echo $data["owner_contact"]; ?></span>
                      </p>
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"><?php echo $data["owner_email"]; ?></span>
                      </p>
                      <p>
                        <strong>Gender: </strong>
                        <span class="color-text-a"><?php echo $data["owner_gender"]; ?></span>
                      </p>
                      <p>
                        <strong>District: </strong>
                        <span class="color-text-a"><?php echo $data["dist_name"]; ?></span>
                      </p>
                      <p>
                        <strong>Place: </strong>
                        <span class="color-text-a"><?php echo $data["place_name"]; ?></span>
                      </p>
                      <p><input type="submit" name="editprofile" id="editprofile" value="Edit Profile" />
                      <input type="submit" name="changepassword" id="changepassword" value="Change Password" /></p>
                    </div>
                  </div>
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        

        </div>
      </div>
    </section><!-- End Agent Single -->

  <?php
  }
  ?>

</form>

</body>
</html><?php

include("footer.php");
?>