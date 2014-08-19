<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once('dbobj.php');
include_once('userobj.php');
$user=new userObj($dbObj,1);
print_r($user);
//echo $user->username;
//$exit=userObj::customerEmailExists( 'jsmith@hotmail.com');
//echo "exists: ".$exit;
//echo "row count: ".$user->dbRowCount();
?>
