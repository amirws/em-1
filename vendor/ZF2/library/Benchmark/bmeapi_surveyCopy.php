<<<<<<< HEAD
<?php
/**
This Example shows how to get details of an existing survey
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
$SurveyList=$api->surveyGetList("", "", 1, 10, "", "");
$NewSurveyId=$api->surveyCopy($SurveyList[0]['id'],"BSNL Survey");


if ( !$NewSurveyId )
{
	echo "Error!";
	echo "\n\tCode=".$api->errorCode;
	echo "\n\tMsg=".$api->errorMessage."\n";
}
else
{

  echo("New Survey Id : ".$NewSurveyId);
  }
?>
=======
<?php
/**
This Example shows how to get details of an existing survey
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
$SurveyList=$api->surveyGetList("", "", 1, 10, "", "");
$NewSurveyId=$api->surveyCopy($SurveyList[0]['id'],"BSNL Survey");


if ( !$NewSurveyId )
{
	echo "Error!";
	echo "\n\tCode=".$api->errorCode;
	echo "\n\tMsg=".$api->errorMessage."\n";
}
else
{

  echo("New Survey Id : ".$NewSurveyId);
  }
?>
>>>>>>> 250a993699aa8885e23578fdfcdb6d486f7dbfae
