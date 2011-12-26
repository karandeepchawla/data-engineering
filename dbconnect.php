<?php

$connection = mysql_connect('localhost','root','');
if(!$connection)
{
die("Could not connect to server:");
}
if(!mysql_select_db("karandeep"))
{
die("Could not connect to database");
}


?>