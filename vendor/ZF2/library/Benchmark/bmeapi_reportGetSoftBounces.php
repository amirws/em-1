<<<<<<< HEAD
<?php
/**
Get the email addresses which soft bounced in a given campaign,using the paging limits, ordered by the email or date of the bounced record.
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

$retval = $api->reportGetSoftBounces($emailID, 1, 100, "", "");

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Soft Bounces Returned:\n";
  echo "<table border=1>";
  echo "<tr><td>  </td><td> Email </td><td> Name </td><td> Type </td></tr>";
  foreach($retval as $reportData){
    echo "<tr>";
    echo "<td>".$reportData['sequence']."</td><td>".$reportData['email']."</td>";
    echo "<td> ".$reportData['name']."</td><td> ".$reportData['type']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>
=======
<?php
/**
Get the email addresses which soft bounced in a given campaign,using the paging limits, ordered by the email or date of the bounced record.
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

$retval = $api->reportGetSoftBounces($emailID, 1, 100, "", "");

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Soft Bounces Returned:\n";
  echo "<table border=1>";
  echo "<tr><td>  </td><td> Email </td><td> Name </td><td> Type </td></tr>";
  foreach($retval as $reportData){
    echo "<tr>";
    echo "<td>".$reportData['sequence']."</td><td>".$reportData['email']."</td>";
    echo "<td> ".$reportData['name']."</td><td> ".$reportData['type']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
