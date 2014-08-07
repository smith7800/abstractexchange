<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once('userobj.php');
$user=new userObj(2);
print_r($user);
echo $user->username;
//$exit=userObj::customerEmailExists( 'jsmith@hotmail.com');
//echo "exists: ".$exit;
?>
