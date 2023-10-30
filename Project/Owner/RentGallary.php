<?php
include("../Assets/Connection/Connection.php");

session_start();

$ownerid=$_SESSION["lgid"];
$houseid=$_SESSION["houseid"];
include("../Assets/SessionValidator.php");

if(isset($_GET["did"]))
{
  $delQry="delete from tbl_housegallary where gallary_id='".$_GET["did"]."'";
  if($conn->query($delQry))
  {
    ?>
        <script>
    alert("Deleted");
    window.location="RentGallary.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="RentGallary.php";
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
</head>

<body><?php
include("header.php");
?>

<center>
<form id="form1" name="form1" method="post" action="">
<section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
    <tr>
      <td>SI NO</td>
      <td>Image</td>
      <td>Caption</td>
      <td>Action</td>
    </tr>
    </thead>
                                <tbody>
    <?php
    $selectqry="select * from tbl_housegallary where house_id='".$houseid."'";
	$row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><img src="../Assets/Files/House/Gallary/<?php echo $data["gallary_filename"]; ?>" width="120" height="120"></td>
      <td><?php echo $data["gallary_caption"]; ?></td>
      <td><a href="RentGallary.php?did=<?php echo $data["gallary_id"];?>">Delete</a></td>
    </tr>
    <?php
  }
  ?>
  </tbody>
                            </table>
                        </div>
                    </div>

                </section>
</form>
</center>
</body>
</html><?php

include("footer.php");
?>