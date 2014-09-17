<<<<<<< HEAD
<?php
/**
This Example shows how to get the list of existing Events
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

$retval = $api->ticketGetList("12513", "", "", "", 1, 5, "", "");

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {

  print_r ($retval);
  echo sizeof($retval)." Events Returned:\n";
  /*
  echo "<table>";
  echo "<tr><td>Event ID</td><td>Event Name </td><td> status</td><td> sold </td><td> attendeemax </td><td> startdate </td><td> enddate </td><td> repeat </td><td> timezone </td>";
  echo "</tr>";
  foreach($retval as $eventData){
    echo "<tr>";
    echo "<td>".$eventData['eventid']."</td><td>".$eventData['eventname']."</td>";
    echo "<td>".$eventData['status']."</td><td>".$eventData['sold']."</td>";
    echo "<td>".$eventData['attendeemax']."</td><td>".$eventData['startdate']."</td>";
    echo "<td>".$eventData['enddate']."</td>";
    echo "<td>".$eventData['repeat']."</td><td>".$eventData['timezone']."</td>";
    echo "</tr>";
  }
  echo "</table>"; */

  echo "<table>";
  	  foreach($retval as $k=>$v)
  	  {
  		if ( !is_array($v) )
  			{
  			   echo "<tr><td>" . $k . "</td><td>" . $v ."</td></tr>";
  			}
  			else
  			{
  			   echo "<tr><td>" . $k . "</td><td>" . print_r($v) ."</td></tr>";
  			};
  	  }
	     echo "</table>";
}
?>



=======
<?php
/**
This Example shows how to get the list of existing Events
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

$retval = $api->ticketGetList("12513", "", "", "", 1, 5, "", "");

if (!$retval){
  echo "Error!";
  echo "\n\tCode=".$api->errorCode;
  echo "\n\tMsg=".$api->errorMessage."\n";
} else {

  print_r ($retval);
  echo sizeof($retval)." Events Returned:\n";
  /*
  echo "<table>";
  echo "<tr><td>Event ID</td><td>Event Name </td><td> status</td><td> sold </td><td> attendeemax </td><td> startdate </td><td> enddate </td><td> repeat </td><td> timezone </td>";
  echo "</tr>";
  foreach($retval as $eventData){
    echo "<tr>";
    echo "<td>".$eventData['eventid']."</td><td>".$eventData['eventname']."</td>";
    echo "<td>".$eventData['status']."</td><td>".$eventData['sold']."</td>";
    echo "<td>".$eventData['attendeemax']."</td><td>".$eventData['startdate']."</td>";
    echo "<td>".$eventData['enddate']."</td>";
    echo "<td>".$eventData['repeat']."</td><td>".$eventData['timezone']."</td>";
    echo "</tr>";
  }
  echo "</table>"; */

  echo "<table>";
  	  foreach($retval as $k=>$v)
  	  {
  		if ( !is_array($v) )
  			{
  			   echo "<tr><td>" . $k . "</td><td>" . $v ."</td></tr>";
  			}
  			else
  			{
  			   echo "<tr><td>" . $k . "</td><td>" . print_r($v) ."</td></tr>";
  			};
  	  }
	     echo "</table>";
}
?>



>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
