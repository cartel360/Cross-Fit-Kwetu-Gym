<?php

header("Content-Type: application/json");

$response = '{
    "ResultCode": 0,
    "ResultDesc": "Confirmation Received Successfully"
}';

// Data
$mpesaResponse = file_get_contents('php://input');

//Log the Response
$logfile = "MpesaValidationResponse.txt";
$jsonMpesaResponse = json_decode($mpesaResponse, true);

// Write File
$log = fopen($logfile, "a");

fwrite($log, $mpesaResponse);

fclose($log);

echo $response;

?>
