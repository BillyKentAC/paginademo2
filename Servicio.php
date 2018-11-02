<?php

function consumirWebService($nroCuenta,$password,$cantidad)
{
  //The url you wish to send the POST request to
  $url = "http://localhost:8081/clientesaldo";

  //The data you want to send via POST
  $fields = [
  'nroCuenta' => $nroCuenta,
  'password' => $password,
  'cantidad' => $cantidad
  ];

  //url-ify the data for the POST
  $fields_string = json_encode($fields);

  //open connection
  $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_ENCODING ,"");
  curl_setopt($ch,CURLOPT_HTTPHEADER,array(
    'Content-Type:application/json',
  ));
    curl_setopt($ch, CURLOPT_ENCODING ,"");
  //So that curl_exec returns the contents of the cURL; rather than echoing it

  //execute post
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
 ?>
