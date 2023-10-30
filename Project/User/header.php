<?php
if(isset($_POST["btn_logout"]))
{
  header("location:../Assets/logout.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
    .logout{
	display: block;
  width: 100%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 8px 32px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 50px;
  font-style: bold;
}
.logout:hover{
	 background-color: #9FC;
  color: black;
}
  </style>

  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 

<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <title>RentalHome</title>
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


  
</head>

<body>
  
  <!-- ======= Header/Navbar ======= -->
  
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
  <div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
    </div>
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="HomePage.php">Perfect<span class="color-b">Home</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link " href="HomePage.php">Home</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="MyProfile.php">My Profile</a>
              <a class="dropdown-item " href="EditProfile.php">Edit Profile</a>
              <a class="dropdown-item " href="ChangePassword.php">Change Password</a>
            </div>
          </li>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="RentSearch.php">Rent</a>
              <a class="dropdown-item " href="LeaseSearch.php">Lease</a>
            </div>
          </li>

          

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Houses</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="RentHouses.php">Rent</a>
              <a class="dropdown-item " href="LeaseHouses.php">Lease</a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Others</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="RequestStatus.php">Rent Request Status</a>
              <a class="dropdown-item " href="LeaseRequestStatus.php">Lease Request Status</a>
              <a class="dropdown-item " href="Feedback.php">Feedbacks</a>
            </div>
          </li>

          
        </ul>
      </div>

      <form id="form1" name="form1" method="post" action="">
      <!--<button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" >
        <i class="bi bi-search"></i>
      </button>-->
      <input type="submit" name="btn_logout" id="btn_logout" value="Logout" class="logout"/>

</form>
    </div>
  </nav>
    <!-- End Header/Navbar -->

  <main id="main">
</body>
</html>