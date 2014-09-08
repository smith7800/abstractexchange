<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('../systemincludes.php');
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
error_log("email: ".$email);
$tempVerify=userObj::customerVerifyLogin($dbObj, $email, $password);
if($tempVerify){
	echo "true";
	
}
else echo "false";
$ip=$_SERVER['REMOTE_ADDR'];
//echo $ip;


?>
