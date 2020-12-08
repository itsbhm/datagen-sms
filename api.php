<?php

$userMsg = "This is a Test Message from DataGen API";

$sender ='XXXXXX';
$mob ='XXXXXXXXXX';
$auth='D!~XXXXXXXXXXXX';
$msg = urlencode($userMsg); 

$url = 'https://api.datagenit.com/sms?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&message='.$msg.'';  // API URL

function SendSMS($hostUrl){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hostUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
$result = curl_exec($ch);
return $result;
} 
// ------------- Exec -------------
$resp = SendSMS($url);
// --------------------------------


// ----- Checking SMS Status ------
$jd_resp = json_decode($resp, true);
$sms_status = ($jd_resp['status']);

echo($sms_status); // sussess or failure