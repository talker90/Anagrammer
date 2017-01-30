<?php
//setting the paramters
$hostname="";
$username="";
$password="";
$dbname="";
$con=mysql_connect($hostname,$username,$password); //creating the connection
if(!$con)
{
  //what if the connection fails
    die('couldnt connect to db');
}
 
mysql_select_db($dbname",$con); //selecting the db
 
?>
