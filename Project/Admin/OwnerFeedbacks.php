<?php
include("../Assets/Connection/connection.php");
session_start();
include("../Assets/SessionValidator.php");
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
      <th>SI NO</th>
      <th>Feedback Subject</th>
      <th>Feedback Discription</th>
      <th>User Name</th>
    </tr>
    </thead>
                                <tbody>
    <?php
    $selectqry="select * from tbl_feedback f inner join tbl_owner o where f.owner_id=o.owner_id and f.user_id=0";
	$row=$conn->query($selectqry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
    $i++; 
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["feedback_subject"] ?></td>
      <td><?php echo $data["feedback_discription"] ?></td>
      <td><?php echo $data["owner_name"] ?></td>
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