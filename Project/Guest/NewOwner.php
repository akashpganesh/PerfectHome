<?php
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
include("../Assets/Connection/connection.php");
if(isset($_POST["btn_submit"]))
{
     $ownername=$_POST["txt_name"];
     $gender=$_POST["gender"];
     $contact=$_POST["txt_contact"];
     $email=$_POST["txt_email"];
     $password=$_POST["txt_password"];
     $password2=$_POST["txt_password2"];
     $place=$_POST["txt_place"];
	 $photo=$_FILES["file_photo"]["name"];
	 $path=$_FILES["file_photo"]["tmp_name"];
	 $proof=$_FILES["file_proof"]["name"];
	 $path1=$_FILES["file_proof"]["tmp_name"];
move_uploaded_file($path,"../Assets/Files/Owner/".$photo);
move_uploaded_file($path1,"../Assets/Files/Owner/".$proof);

if($password==$password2)
{
$selectqry1="select * from tbl_owner where owner_email='".$email."'";
  $row1=$conn->query($selectqry1);
  if($data1=$row1->fetch_assoc())
  {
	  ?>
        <script>
		alert("User Aldredy Existed");
		window.location="NewOwner.php";
		</script>
        <?php
  }
	  else
	  {
     $insertqry="INSERT INTO tbl_owner(owner_name,owner_gender,owner_contact,owner_email,owner_password,place_id,owner_photo,owner_proof)VALUES('".     $ownername."','".$gender."','".$contact."','".$email."','".$password."','".$place."','".$photo."','".$proof."')";
  if($conn->query($insertqry))
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
  
    $mail->addAddress($_POST["txt_email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "Account Created Succesfully";
    $mail->Body = "Hello"." ".$_POST["txt_name"]." "."Your Account Created Succesfully ";
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
    alert("INSERTED");
    window.location="NewOwner.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="NewOwner.php";
    </script>
        <?php
  }
}
}else{
  ?>
        <script>
    alert("Password Missmatch");
    window.location="NewOwner.php";
    </script>
        <?php
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
table{
	border: none;
}
input[type=text],input[type=email],input[type=number],input[type=password],input[type=file],select{
	width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  border-color: #3f6;
}
input[type=submit],input[type=reset]{
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
input[type=submit]:hover,input[type=reset]:hover{
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="470" height="501" border="1" align="center">
  <tr>
      <th scope="row">Name</th>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" placeholder="Name" required /></td>
    </tr>
    <tr>
      <th width="131" scope="row">District</th>
      <td width="323"><label for="txt_district"></label>
        <select name="txt_district" id="txt_district" onChange="getPlace(this.value)">
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
        </select></td>
    </tr>
    <tr>
      <th scope="row">Place</th>
      <td><label for="txt_place"></label>
        <select name="txt_place" id="txt_place">
        <option value="">---select---</option>
        </select></td>
    </tr>
    <tr>
      <th scope="row">Gender</th>
      <td><input type="radio" name="gender" id="btn_male" value="Male" checked="checked" />
      <label for="btn_male">Male 
        <input type="radio" name="gender" id="btn_female" value="Female" />
      Female</label></td>
    </tr>
    <tr>
      <th scope="row">Contact</th>
      <td><label for="txt_contact"></label>
      <input type="number" name="txt_contact" id="txt_contact" placeholder="Contact" pattern="([0-9]{10,10})"/></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" placeholder="Email" required /></td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" placeholder="********" required /></td>
    </tr>
    <tr>
      <th scope="row">Enter Password Again</th>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password2" id="txt_password2" placeholder="********" required /></td>
    </tr>
    <tr>
      <th scope="row">Photo</th>
      <td><label for="file_photo"></label>
        <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <th scope="row">Proof</th>
      <td><label for="file_proof"></label>
        <input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><br /><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div>
      </th>
    </tr>
  </table>
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