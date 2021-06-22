<?php

require 'deposit.php';

header("Content-Type: application/json");

$response = '{
    "ResultCode": 0,
    "ResultDesc": "Confirmation Received Successfully"
}';

// Data
$mpesaResponse = file_get_contents('php://input');

//Log the Response
$logfile = "MpesaConfirmationResponse.txt";
$jsonMpesaResponse = json_decode($mpesaResponse, true);

$transaction = array(
    ':TransactionType' => $jsonMpesaResponse['TransactionType'],
    ':TransID' => $jsonMpesaResponse['TransID'],
    ':TransTime' => $jsonMpesaResponse['TransTime'], 
    ':TransAmount' => $jsonMpesaResponse['TransAmount'], 
    ':BusinessShortCode' => $jsonMpesaResponse['BusinessShortCode'], 
    ':BillRefNumber' => $jsonMpesaResponse['BillRefNumber'], 
    ':InvoiceNumber' => $jsonMpesaResponse['InvoiceNumber'], 
    ':OrgAccountBalance' => $jsonMpesaResponse['OrgAccountBalance'], 
    ':ThirdPartyTransID' => $jsonMpesaResponse['ThirdPartyTransID'], 
    ':MSISDN' => $jsonMpesaResponse['MSISDN'], 
    ':FirstName' => $jsonMpesaResponse['FirstName'], 
    ':MiddleName' => $jsonMpesaResponse['MiddleName'], 
    ':LastName' => $jsonMpesaResponse['LastName']
);


// Write File
$log = fopen($logfile, "a");

fwrite($log, $mpesaResponse);

fclose($log);

echo $response;

insert_response($transaction);

?>