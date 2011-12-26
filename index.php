<html>
<head>
<title>
Upload and Extract
</title>
</head>
<body>
<?php
require('dbconnect.php');

if(isset($_POST['Submit']))
{
require('copyAndCheck.php');
}

?>


<form name="upload_file" action="" method="post" enctype="multipart/form-data">
<input type="file" name="upload">
<input type="submit" name="Submit" value"submit">
</form>
</body>




<?php
mysql_close($connection);
?>