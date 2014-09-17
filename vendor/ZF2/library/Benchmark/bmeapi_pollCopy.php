<<<<<<< HEAD
<?php
require_once'inc/BMEAPI.class.php';
require_once'inc/config.php';

$api=new BMEAPI($username,$password,$apiURL);
if($api->errorCode){
echo"Code:".$api->errorCode."\n";
echo"Msg:".$api->errorMessage."\n";
die();
}
$pollList=$api->pollGetList("","1",1,10,"","");
$pollID=$pollList[0]['id'];
$NewPollName="New Poll";
$NewID=$api->pollCopy($pollID,$NewPollName);
if($NewID!="0")
{
echo("New Poll ID is ".$NewID);
}
else
{
echo("Poll can't be copied");
}

      
=======
<?php
require_once'inc/BMEAPI.class.php';
require_once'inc/config.php';

$api=new BMEAPI($username,$password,$apiURL);
if($api->errorCode){
echo"Code:".$api->errorCode."\n";
echo"Msg:".$api->errorMessage."\n";
die();
}
$pollList=$api->pollGetList("","1",1,10,"","");
$pollID=$pollList[0]['id'];
$NewPollName="New Poll";
$NewID=$api->pollCopy($pollID,$NewPollName);
if($NewID!="0")
{
echo("New Poll ID is ".$NewID);
}
else
{
echo("Poll can't be copied");
}

      
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
?>