<html>
<head>
<title>Update Data</title>
</head>
 
<body>
 <?php
  $i=1;
  foreach($data as $row)
  {
  ?>
	<form method="post">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Enter Your Name </td>
    <td width="329"><input type="text" name="fname" value="<?php echo $row['firstName']; ?>"/></td>
  </tr>
  <tr>
    <td>Enter Your Email </td>
    <td><input type="text" name="lname" value="<?php echo $row['lastName']; ?>"/></td>
  </tr>
  <tr>
    <td>Enter Your Mobile </td>
    <td><input type="text" name="email" value="<?php echo $row['emailAddress']; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input type="submit" name="update" value="Update"/></td>
  </tr>
</table>
	</form>
	<?php } ?>
</body>
</html>