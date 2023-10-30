<?php
include("../Assets/Connection/connection.php");
session_start();
include("../Assets/SessionValidator.php");

if(isset($_POST["btn_save"]))
{
  $place=$_POST["txt_place"];
	$dist_id=$_POST["ddldistrict"];

  $selectqry1="select * from tbl_place where place_name='".$place."' and dist_id='".$dist_id."'";
  $row1=$conn->query($selectqry1);
  if($data1=$row1->fetch_assoc())
  {
	  ?>
        <script>
		alert("Aldredy Existed");
		window.location="Place.php";
		</script>
        <?php
}else{
	$insertqry="INSERT INTO tbl_place(place_name,dist_id) VALUES('".$place."','".$dist_id."')";
	if($conn->query($insertqry))
	{
		?>
        <script>
		alert("insert");
		window.location="place.php";
		</script>
        <?php
	}
	else
	{
		?>
		<script>
		alert("faild");
		window.location="place.php";
		</script>
        <?php
	}
}
}


if(isset($_GET["delID"]))
{
	 $delQry="delete from tbl_place where place_id='".$_GET["delID"]."'";
	 
	if($conn->query($delQry))
	{
		?>
        <script>
		alert("deleted");
		window.location="place.php";
		</script>
        <?php
	}
	else
	{
		?>
		<script>
		alert("faild");
		window.location="place.php";
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

<body><?php
include("header.php");
?>
<br /><br />
<center>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>District</td>
      <td><label for="ddldistrict"></label>
        <select name="ddldistrict" id="ddldistrict">
         <option value="">---select---</option>
        
        <?php
		$selQry="select*from tbl_district";
		$row=$conn->query($selQry);
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["dist_id"];?>"><?php echo $data["dist_name"];?></option>
            <?php
			}
			?>
            
            
      </select>
      </td>
    </tr>
    <tr>
      <td>place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><input type="submit" name="btn_save" id="btn_save" value="save" /></div>
      </td>
    </tr>
  </table>
  <br />
  <hr />
  <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!--Simple Datatable-->
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Place</th>
      <th scope="col">District</th>
      <th scope="col">Action</th>
    </tr>
		</thead>
		<tbody>
    <?php
	$selQry="select*from tbl_place p inner join tbl_district d on p.dist_id=d.dist_id";
	$row=$conn->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["place_name"];?></td>
      <td><?php echo $data["dist_name"];?></td>
      <td><a href="place.php?delID=<?php echo $data["place_id"];?>"><span class="badge bg-danger">delete</span></a></td>
    </tr>
    <?php
	}
	?>
	</tbody>
                            </table>
                        </div>
                    </div>

                </section>
  <br />
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