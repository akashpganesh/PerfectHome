<?php
include("../Assets/Connection/connection.php");

session_start();
 $userid=$_SESSION["lgid"];
 include("../Assets/SessionValidator.php");


if(isset($_POST["btn_update"]))
{
  
  $username=$_POST["txt_name"];
  $gender=$_POST["txt_gender"];
   $contact=$_POST["txt_contact"];
    $email=$_POST["txt_email"];
    $district=$_POST["txt_district"];
     $place=$_POST["txt_place"];
       $photo=$_FILES["file_photo"]["name"];
  $path=$_FILES["file_photo"]["tmp_name"];
   move_uploaded_file($path,"../Assets/Files/User/".$photo);

$updateqry="UPDATE tbl_user SET user_name = '".$username."',user_gender = '".$gender."',user_contact = '".$contact."',user_email = '".$email."',place_id = '".$place."',user_photo = '".$photo."' WHERE user_id = '".$userid."'";
   
   
  if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("UPDATED");
    window.location="EditProfile.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="EditProfile.php";
    </script>
        <?php
  }
   
   
   

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
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
.button{
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
.button:hover{
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

<?php
 $selectqry="select * from tbl_user u inner join tbl_place p inner join tbl_district d where user_id='".$userid."' AND u.place_id=p.place_id AND p.dist_id=d.dist_id";
  $row=$conn->query($selectqry);
   while($data=$row->fetch_assoc())
  {
	  ?>
  <table border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data["user_name"]; ?>" required/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["user_contact"]; ?>" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data["user_email"]; ?>" required/></td>
    </tr>
    <tr>
      <td>Gender</td>
      <?php $gender=$data["user_gender"]; ?>
      <td><input type="radio" name="txt_gender" id="txt_male" value="Male" <?php echo ($gender=='Male') ? "checked" : "" ;?> />
      <label for="txt_gender">Male 
        <input type="radio" name="txt_gender" id="txt_female" value="Female" <?php echo ($gender=='Female') ? "checked" : "" ;?>/>
      Female</label></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="txt_district"></label>
        <select name="txt_district" id="txt_district" onChange="getPlace(this.value)" required>
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
      <td>Place</td>
      <td><label for="txt_place"></label>
        <select name="txt_place" id="txt_place" required>
        <option value="">---select---</option>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required/></td>
    </tr>
    <?php
    }
	?>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" class="button" />
        
      </div></td>
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
</html>
<?php

include("footer.php");
?>