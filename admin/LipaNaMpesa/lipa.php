<?php

$consumerKey = "PhTcimspkNT9JnhGc9q2xnZyGZl0cGGE";
$consumerSecret = "RJmUWBZy9QPUco4n";

$headers = ["Content-Type: application/json; charset-utf8"];

$url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.":".$consumerSecret);

$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);

$access_token = $result->access_token;

echo $access_token;




  $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

  $BusinessShortCode = 174379;
  $Timestamp = date('YmdHms'); //20210420234112
  $PartyA = '254757206542';
  $CallBackURL = 'http://e03416278dcf.ngrok.io/Student-Bank/Pay_API/callback_url.php';
  $AccountReference = 'CAT001';
  $TransactionDesc = 'Test Trial 001';
  $Amount = '1';
  $PassKey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

  $Password = base64_encode($BusinessShortCode.$PassKey.$Timestamp);

  $stkheader =  array('Content-Type:application/json', 'Authorization:Bearer '.$access_token);
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
  
  
  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );
  
  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;
