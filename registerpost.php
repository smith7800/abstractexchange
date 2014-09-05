<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('systemincludes.php');


$userUsername="";
$email=$_POST['email'];
$password=$_POST['password'];
$securityquest1=$_POST['quest1'];
$securityans1=$_POST['answer1'];
$securityquest2=$_POST['quest2'];
$securityans2=$_POST['answer2'];
$userUnverifiedFlag=1;
$is_admin=0;
$timezone='EST';
$logged_ip=$_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_forwarded = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else $ip_forwarded = '0.0.0.0';

$is_locked=0;
$agreed_to_TOS=0;

$emailExists=userObj::emailExists( $dbObject, $email );
if($emailExists){
	echo "That email already exists.  Click here to recover your password.";
}
else{
	$tempInsert=userObj::insertUser($dbObj,$email,$password,$logged_ip,$ip_forwarded,$securityquest1,$securityans1,$securityquest2,$securityans2);
}

//print_r($tempInsert);
?>
