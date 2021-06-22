<?php

require 'sample.php';

$callbackResponse = file_get_contents('php://input');

$logfile = "callbackResponse.txt";

$jsonMpesaResponse = json_decode($callbackResponse, true);

foreach($jsonMpesaResponse as $elem) {
    $resultCode = $elem['Body']['stkCallback']['ResultCode'];
    echo "<br/>";
}

$transaction = array(
    $resultCode,
    ':resultCode' => $jsonMpesaResponse['Body']['stkCallback']['ResultCode'],
    ':Amount' => $jsonMpesaResponse['Body']['stkCallback']['CallbackMetadata']['Item']['']
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

// echo :One;

$log = fopen($logfile, "a");
fwrite($log, $callbackResponse);
fclose($log);