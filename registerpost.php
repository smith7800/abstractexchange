<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//include('classes/dbobj.php');
$db = new PDO('mysql:host=localhost;dbname=exchange;charset=utf8', 'root', 'Maddy.7800!!!!');
//$stmt = $db->query("SELECT * FROM user");
//print_r($stmt);
foreach($db->query('SELECT * FROM user') as $row) {
    echo $row['id'].' '.$row['username'];}
print_r($_GET);
$username=$_GET['username'];
$password=$_GET['password'];
$email=$_GET['email'];
$security=$_GET['security'];
echo $username;


?>
