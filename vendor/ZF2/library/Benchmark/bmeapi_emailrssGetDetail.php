<<<<<<< HEAD
<?php
/**
This Example shows how to get details of an existing Email
**/
require_once 'inc/BMEAPI.class.php';
require_once 'inc/config.php'; //contains username & password

//This hack actually skips the login and lets you choose the API Key to expire.
$api = new BMEAPI($username, $password, $apiURL);
if ($api->errorCode){
  // an error occurred while logging in
  echo "code:".$api->errorCode."\n";
  echo "msg :".$api->errorMessage."\n";
  die();
}

$retval = $api->emailRssGetDetail($emailID);

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {

  echo "<table>";
  foreach($retval as $k=>$v) {
    echo "<tr><td>" . $k . "</td><td>" . $v ."</td></tr>";
  }
  echo "</table>";
}
?>
=======
<?php
/**
This Example shows how to get details of an existing Email
**/
require_once 'inc/BMEAPI.class.php';
require_once 'inc/config.php'; //contains username & password

//This hack actually skips the login and lets you choose the API Key to expire.
$api = new BMEAPI($username, $password, $apiURL);
if ($api->errorCode){
  // an error occurred while logging in
  echo "code:".$api->errorCode."\n";
  echo "msg :".$api->errorMessage."\n";
  die();
}

$retval = $api->emailRssGetDetail($emailID);

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {

  echo "<table>";
  foreach($retval as $k=>$v) {
    echo "<tr><td>" . $k . "</td><td>" . $v ."</td></tr>";
  }
  echo "</table>";
}
?>
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
