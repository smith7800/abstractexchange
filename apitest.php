<?php
require_once 'jsonrpcphp/includes/jsonRPCClient.php';
require_once('EasyBitcoin-PHP/easybitcoin.php');
$bitcoin = new Bitcoin('BCcoinrpc','BC8JoSsVxxN66nJSAsM823997795wwo88zg88H1Q4WPNbLKWdV66WLLDjp9','localhost','18830');
//$slimcoin = new jsonRPCClient('http://BCcoinrpc:BC8JoSsVxxN66nJSAsM823997795wwo88zg88H1Q4WPNbLKWdV66WLLDjp9@127.0.0.1:18830');
 
$bitcoin->sendtoaddress('BRj7piqpYg93QoWirqGhsMeUK6ES3VP2Fu',5);
  echo "<pre>\n";
  print_r($bitcoin->getinfo()); echo "\n";
  echo "Received: ".$bitcoin->getreceivedbylabel("Your Address")."\n";
  echo "</pre>";
?>
