<<<<<<< HEAD
<?php
/**
Get the link URLS for the given campaign.
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

$retval = $api->reportGetEmailLinks($emailID);

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Link URLS Returned:\n";
  echo "<table border=1>";
  echo "<tr><td>  </td><td>URL </td></tr>";
  foreach($retval as $reportData){
    echo "<tr>";
    echo "<td>".$reportData['sequence']."</td><td>".$reportData['URL']."</td>";    
    echo "</tr>";
  }
  echo "</table>";
}
?>
=======
<?php
/**
Get the link URLS for the given campaign.
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

$retval = $api->reportGetEmailLinks($emailID);

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {
  echo sizeof($retval)." Link URLS Returned:\n";
  echo "<table border=1>";
  echo "<tr><td>  </td><td>URL </td></tr>";
  foreach($retval as $reportData){
    echo "<tr>";
    echo "<td>".$reportData['sequence']."</td><td>".$reportData['URL']."</td>";    
    echo "</tr>";
  }
  echo "</table>";
}
?>
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
