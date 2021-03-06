<<<<<<< HEAD
<?php
/**
Get the contacts from the contact list.
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

$retval = $api->segmentGet("", 1, 1, "");
foreach($retval as $listData){
    $segmentID = $listData['id'];
}

$retval = $api->segmentGetContacts($segmentID, "", 1, 5, "", "");

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Contacts Returned:\n";
  echo "<table>";
  echo "<tr><td>  </td><td>Contact ID</td><td> Email </td><td> Name </td>";
  echo "<td> Middle Name</td> <td> Last Name</td></tr>";
  foreach($retval as $listData){
    echo "<tr>";
    echo "<td>".$listData['sequence']."</td><td>".$listData['id']."</td>";
    echo "<td>".$listData['email']."</td><td>".$listData['firstname']."</td>";
    echo "<td>".$listData['middlename']."</td><td>".$listData['lastname']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>
=======
<?php
/**
Get the contacts from the contact list.
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

$retval = $api->segmentGet("", 1, 1, "");
foreach($retval as $listData){
    $segmentID = $listData['id'];
}

$retval = $api->segmentGetContacts($segmentID, "", 1, 5, "", "");

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Contacts Returned:\n";
  echo "<table>";
  echo "<tr><td>  </td><td>Contact ID</td><td> Email </td><td> Name </td>";
  echo "<td> Middle Name</td> <td> Last Name</td></tr>";
  foreach($retval as $listData){
    echo "<tr>";
    echo "<td>".$listData['sequence']."</td><td>".$listData['id']."</td>";
    echo "<td>".$listData['email']."</td><td>".$listData['firstname']."</td>";
    echo "<td>".$listData['middlename']."</td><td>".$listData['lastname']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
