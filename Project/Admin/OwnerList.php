<?php
include("../Assets/Connection/connection.php");
session_start();
include("../Assets/SessionValidator.php");

if(isset($_GET["did"]))
{
  $delQry="delete from tbl_owner where owner_id='".$_GET["did"]."'";
  if($conn->query($delQry))
  {
    ?>
        <script>
    alert("Deleted");
    window.location="OwnerList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="OwnerList.php";
    </script>
        <?php
  }
}

if(isset($_GET["aid"]))
{
  
  $updateqry="UPDATE tbl_owner SET owner_status = 1 where owner_id='".$_GET["aid"]."' ";
   if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Accepted");
    window.location="OwnerList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="OwnerList.php";
    </script>
        <?php
  }
}

if(isset($_GET["rid"]))
{
  
  $updateqry="UPDATE tbl_owner SET owner_status = 2 where owner_id='".$_GET["rid"]."' ";
   if($conn->query($updateqry))
  {
    ?>
        <script>
    alert("Rejected");
    window.location="OwnerList.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="OwnerList.php";
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
      <th width="24" scope="col"><p>SI NO</p></th>
      <th width="50" scope="col">District</th>
      <th width="36" scope="col">Place</th>
      <th width="40" scope="col">Name</th>
      <th width="50" scope="col">Gender</th>
      <th width="52" scope="col">Contact</th>
      <th width="38" scope="col">Email</th>
      <th width="120" scope="col">Photo</th>
      <th width="120" scope="col">Proof</th>
      <th width="43" scope="col">Action</th>
      <th colspan="2" scope="col">status</th>
</tr>
</thead>
                                <tbody>
      <?php
  $selectqry="select * from tbl_owner o inner join tbl_place p inner join tbl_district d where o.place_id=p.place_id AND p.dist_id=d.dist_id";
  $row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["dist_name"]; ?></td>
      <td><?php echo $data["place_name"]; ?></td>
      <td><?php echo $data["owner_name"]; ?></td>
      <td><?php echo $data["owner_gender"]; ?></td>
      <td><?php echo $data["owner_contact"]; ?></td>
      <td><?php echo $data["owner_email"]; ?></td>
      <td><img src="../Assets/Files/Owner/<?php echo $data["owner_photo"]; ?>" width="120" height="120"></td>
      <td><img src="../Assets/Files/Owner/<?php echo $data["owner_proof"]; ?>" width="120" height="120"></td>
      <td><a href="OwnerList.php?did=<?php echo $data["owner_id"];?>">Delete</a></td>
      <td width="44"><p><a href="OwnerList.php?aid=<?php echo $data["owner_id"];?>">Accept</a></p>
        <p><a href="OwnerList.php?rid=<?php echo $data["owner_id"];?>">Reject</a></p></td>
      <td width="37"><?php
      if($data["owner_status"]==1)
    echo "Accepted";
    if($data["owner_status"]==2)
    echo "Rejected";
    ?></td>
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