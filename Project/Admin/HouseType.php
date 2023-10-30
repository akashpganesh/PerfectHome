<?php
include("../Assets/Connection/connection.php");
session_start();
include("../Assets/SessionValidator.php");

if(isset($_POST["submit"]))
{
	$housetype=$_POST["txt_type"];
	$insertqry="INSERT INTO tbl_housetype(type_name)VALUES('".$housetype."')";
	if($conn->query($insertqry))
	{
		?>
        <script>
		alert("INSERTED");
		window.location="HouseType.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location="HouseType.php";
		</script>
        <?php
	}
}
	


if(isset($_GET["did"]))
{
	$delQry="delete from tbl_housetype where type_id='".$_GET["did"]."'";
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted");
		window.location="HouseType.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location="HouseType.php";
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
.text{
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

<body><?php
include("header.php");
?>


<center><form id="form2" name="form2" method="post" action="">
<table width="400" border="1">
  <tr>
    <td width="156" height="79">House Type</td>
    <td width="156">
      <label for="txt_type"></label>
      <input type="text" name="txt_type" id="txt_type"  class="text" required/>
    </td>
  </tr>
  <tr>
    <td height="77" colspan="2">
      <label for="txt_type"></label>
      <div align="center">
        <input type="submit" name="submit" id="submit" class="button" value="Submit" />
      </div>
    </td>
    </tr>
</table>
<br />
<hr />
<br />
<section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
  <tr>
    <th width="48" scope="col">SI NO</th>
    <th width="151" scope="col">House Type</th>
    <th width="201" scope="col">ACTION</th>
  </tr>
  </thead>
                                <tbody>
  <?php
  $selectqry="select * from tbl_housetype";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	  ?>
        
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data["type_name"]; ?></td>
    <td><a href="HouseType.php?did=<?php echo $data["type_id"];?>"><span class="badge bg-danger">Delete</span></a></td>
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
<script src="../Assets/Templates/Admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

</html><?php

include("footer.php");
?>