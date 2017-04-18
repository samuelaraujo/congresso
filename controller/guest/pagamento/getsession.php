<?php
	
use Utils\Conexao;

header('Content-type: application/json');
$response = new stdClass();

$credentials['email'] = 'jaissonssantos@gmail.com';
$credentials['token'] = 'A23B0F63E9684FF489709FC57243801A';
$sessionURL = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=jaissonssantos@gmail.com&token=A23B0F63E9684FF489709FC57243801A';

$credentials = http_build_query($credentials);

$curl = curl_init($sessionURL);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, 
	Array('Content-Type: application/xml; charset=ISO-8859-1')
);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $credentials);
$xml = curl_exec($curl);
$results = simplexml_load_string($xml);
	
if( count($results->error) > 0 ){
	http_response_code(500);
	$response->error = 'Ocorreu um erro na requisição(session) de pagamento';
	die();
}

http_response_code(200);
$response = array(
    'results' => $results
);

echo json_encode($response);