<<<<<<< HEAD
<?php
/**
Unsubscribe the contacts from the given contact list.
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

 $contactList = $api->listGet("", 1, 1, "", "");
    $listID = $contactList[0]['id'];

    $contacts = $api->listGetContacts($listID, "", 1, 100, "", "");
    $contact="";


	$contact=$contacts[0]['email'];


$retval=$api->listdeleteemailcontact($listID,$contact);


if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo $retval . " Contacts Deleted";
}
=======
<?php
/**
Unsubscribe the contacts from the given contact list.
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

 $contactList = $api->listGet("", 1, 1, "", "");
    $listID = $contactList[0]['id'];

    $contacts = $api->listGetContacts($listID, "", 1, 100, "", "");
    $contact="";


	$contact=$contacts[0]['email'];


$retval=$api->listdeleteemailcontact($listID,$contact);


if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo $retval . " Contacts Deleted";
}
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
?>