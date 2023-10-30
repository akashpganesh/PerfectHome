<?php
include("../Assets/Connection/Connection.php");

session_start();

if(isset($_POST["btnLogin"]))
{
		$email = $_POST["txtemail"];
		$password = $_POST["txtpassword"];
		
		$selQry1 = "select * from tbl_user where user_email='".$email."' and user_password='".$password."' and user_status between 0 and 1";
		$row1=$conn->query($selQry1);
		
		
		$selQry2 = "select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
		$row2=$conn->query($selQry2);
		
		
		$selQry3 = "select * from tbl_owner where owner_email='".$email."' and owner_password='".$password."' and owner_status=1";
		$row3=$conn->query($selQry3);
		
		
		if($data1=$row1->fetch_assoc())
		{
			$_SESSION["lgid"]=$data1["user_id"];
			$_SESSION["lgname"]=$data1["user_name"];
			
			header("location:../User/HomePage.php");
		}
		else if($data2=$row2->fetch_assoc())
		{
			$_SESSION["lgid"]=$data2["admin_id"];
			$_SESSION["lgname"]=$data2["admin_name"];
			
			header("location: ../Admin/HomePage.php");
		}
		else if($data3=$row3->fetch_assoc())
		{
			$_SESSION["lgid"]=$data3["owner_id"];
			$_SESSION["lgname"]=$data3["owner_name"];
			
			header("location:../Owner/HomePage.php");
		}
		else
		{
?>
			 <script>
		         alert("Invalid Username or Password");
				 
			</script>
            
            <?php
		}
}

?>



<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">

	</head>
	<body>
    <?php

include("header.php");
?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../Assets/Templates/User/assets/img/property-3.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										
									</p>
								</div>
			      	</div>
							<form action="#" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" class="form-control" placeholder="Email" name="txtemail" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="txtpassword" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="btnLogin" >Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="NewUser.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Templates/Login/js/jquery.min.js"></script>
  <script src="../Assets/Templates/Login/js/popper.js"></script>
  <script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Login/js/main.js"></script>

	</body>
</html>

<?php

include("footer.php");
?>