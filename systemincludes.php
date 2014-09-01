<?php
//include_once("globalfunctions.php");
//$dbConnect = new PDO('mysql:host=localhost;dbname=exchange;charset=utf8', 'root', 'Maddy.7800!!!!');

require_once("classes/dbobj.php");
$dbConnect =new dbObj($newName='exchange',$newHost='localhost',$newUser='root',$newPassword='Maddy.7800!!!!');
require_once("classes/userobj.php");

//include('dbconnect.php');
?>
