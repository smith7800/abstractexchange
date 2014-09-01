<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
<<<<<<< HEAD
require_once('systemincludes.php');
$tempInsert=userObject::insertUser( &$dbObject,$userFirstName="yo",$userLastName="man",$userEmail="yo@man.om",$userUsername="yoman",$userPassword="yoandshit",$userUnverifiedFlag=1)


=======
require_once("systemincludes.php");
$tempInsert=userObj::insertUser( $dbObject,$first,$last,$email,$uname,$passw);
>>>>>>> 61499e92e6d57aa992efbbce1fa086f25eee7d84

?>
