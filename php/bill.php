<?php
error_reporting(0);
//include_once("dbconnect.php");

$email = $_GET['email'];
$name = $_GET['name']; 
$amount = $_GET['amount']; 

$api_key = '09504fbb-3eb5-4d47-8e99-6e73fe6f6fae';
$collection_id = 'kaqpz939';
$host = 'https://billplz-staging.herokuapp.com/api/v3/bills';

$data = array(
          'collection_id' => $collection_id,
          'email' => $email,
          'name' => $name,
          'amount' => $amount * 100,
		  'description' => 'Payment for order' ,
          'callback_url' => "http://crimsonwebs.com/s274004/sound4u/php/return_url",
          'redirect_url' => "http://crimsonwebs.com/s274004/sound4u/php/payment.php?email=$email&name=$name&amount=$amount" 
);


$process = curl_init($host );
curl_setopt($process, CURLOPT_HEADER, 0);
curl_setopt($process, CURLOPT_USERPWD, $api_key . ":");
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($process, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($process, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($data) ); 

$return = curl_exec($process);
curl_close($process);

$bill = json_decode($return, true);

echo "<pre>".print_r($bill, true)."</pre>";
header("Location: {$bill['url']}");
?>