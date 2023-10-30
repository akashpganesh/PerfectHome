<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>SI NO</td>
      <td>Renter Name</td>
      <td>House Name</td>
      <td>&nbsp;</td>
    </tr>
    <?php
	$selectqry="select * from tbl_agreement a inner join tbl_renter r inner join tbl_user,tbl_house where a.renter_id!=r.renter_id and r.house_id=h.house_id and r.user_id=u.user_id";
	?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>