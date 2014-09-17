<<<<<<< HEAD
<?php
/**
Get the segments in your account.
**/
require_once 'inc/BMEAPI.class.php';
require_once 'inc/config.php'; //contains username & password

$api = new BMEAPI($username, $password, $apiURL);
if ($api->errorCode){
  // an error occurred while logging in
  echo "code:".$api->errorCode."\n";
  echo "msg :".$api->errorMessage."\n";
  die();
}


$retval = $api->listGet("", 1, 1, "", "");
foreach($retval as $listData){
    $listID = $listData['id'];
}
$segmentDetail["segmentname"] = "segment";
$segmentDetail["description"] = "test api";
$segmentDetail["listid"] = $listID;

$retval = $api->segmentCreate($segmentDetail);

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Segment Created \n" . $retVal;
}
?>
=======
<?php
/**
Get the segments in your account.
**/
require_once 'inc/BMEAPI.class.php';
require_once 'inc/config.php'; //contains username & password

$api = new BMEAPI($username, $password, $apiURL);
if ($api->errorCode){
  // an error occurred while logging in
  echo "code:".$api->errorCode."\n";
  echo "msg :".$api->errorMessage."\n";
  die();
}


$retval = $api->listGet("", 1, 1, "", "");
foreach($retval as $listData){
    $listID = $listData['id'];
}
$segmentDetail["segmentname"] = "segment";
$segmentDetail["description"] = "test api";
$segmentDetail["listid"] = $listID;

$retval = $api->segmentCreate($segmentDetail);

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Segment Created \n" . $retVal;
}
?>
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae