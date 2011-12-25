<?php

$connection = mysql_connect('localhost','root','');
if(!$connection)
{
die("Could not connect to database:");
}

$uploaddir = 'users/karandeep/sites/data-engineering/files';
?>