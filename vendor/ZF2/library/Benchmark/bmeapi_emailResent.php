<<<<<<< HEAD
<?php
/**
 Resend an email campaign to contacts that were added since the campaign was last sent.
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
$scheduleDate = date('d M Y', strtotime('+1 week'));
$retval = $api->emailResend($emailID, $scheduleDate);

if (!$retval)
{
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
}
else
{
  echo "Email Scheduled \n";
}

=======
<?php
/**
 Resend an email campaign to contacts that were added since the campaign was last sent.
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
$scheduleDate = date('d M Y', strtotime('+1 week'));
$retval = $api->emailResend($emailID, $scheduleDate);

if (!$retval)
{
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
}
else
{
  echo "Email Scheduled \n";
}

>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
?>