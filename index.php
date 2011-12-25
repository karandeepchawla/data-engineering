<html>
<head>
<title>
Upload and Extract
</title>
</head>
<body>
<?php
require('dbconnect.php');

print sys_get_temp_dir();

#set file name
$fileName = $_FILES['upload']['name'];
$tempLocation = $_FILES['upload']['tmp_name'];

echo "<br>".$fileName."<br>";
echo $tempLocation."<br>";
$new_path = "files/".$fileName;

if(!(is_uploaded_file($_FILES['upload']['tmp_name'])))
{
echo 'file was not uploaded';
}
if(is_uploaded_file($_FILES['upload']['tmp_name']))
{

$copyFile = move_uploaded_file($_FILES['upload']['tmp_name'], $new_path);
}

?>


<form name="upload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="upload">
<input type="submit" name="Submit" value"submit">
</form>
</body>




<?php
mysql_close($connection);
?>