<?php
if(isset($_POST["btn_login"]))
{
  header("location: ../Guest/Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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

  <style>
    input[type=submit],input[type=reset]{
	display: block;
  width: 100%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 8px 35px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  border-radius: 50px;
  font-style: bold;
}
input[type=submit]:hover,input[type=reset]:hover{
	 background-color: #9FC;
  color: black;
}
  </style>

</head>

<body>


  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="../Index/index.html">Perfect<span class="color-b">Home</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link " href="../Index">Home</a>
          </li>

          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New Profile</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="NewUser.php">User</a>
              <a class="dropdown-item " href="NewOwner.php">Owner</a>
              
            </div>
          </li>


          <!--<li class="nav-item">
            <a class="nav-link active" href="Login.php">Login</a>
          </li>-->


        </ul>
      </div>

      <form id="form1" name="form1" method="post" action="">

      <!--<button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>-->
        <input type="submit" name="btn_login" id="btn_login" value="Login" />

      </button>

    </form>

    </div>
  </nav><!-- End Header/Navbar -->

  <main id="main">
</body>
</html>