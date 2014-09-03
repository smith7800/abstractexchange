<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('systemincludes.php');

$userFullName="jksljdfsd";
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
$loggedIp='0.0.0.0';
$is_locked=0;
$agreed_to_TOS=0;

$tempInsert=userObj::insertUser2(&$dbObj,$email,$password,$securityquest1,$securityans1,$securityquest2,$securityans2);

//print_r($tempInsert);
?>
