<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('systemincludes.php');
$tempInsert=userObj::insertUser( &$dbObject,$userFirstName="yo",$userLastName="man",$userEmail="yo@man.om",$userUsername="yoman",$userPassword="yoandshit",$userUnverifiedFlag=1);


?>
