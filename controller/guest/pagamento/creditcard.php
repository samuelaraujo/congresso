<?php
	
use Utils\Conexao;

header('Content-type: application/json');
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

$url = transactionsURL;
$credentials['email'] = PAGSEURO_EMAIL;
$credentials['token'] = PAGSEURO_TOKEN;
$credentials['paymentMode'] = 'default';
$credentials['currency'] = 'BRL';
$credentials['paymentMethod'] = 'creditCard';
$credentials['receiverEmail'] = 'suporte@lojamodelo.com.br';
$credentials['itemId1'] = '0001';
$credentials['itemDescription1'] = 'Produto de teste';
$credentials['itemAmount1'] = '80.00';
$credentials['itemQuantity1'] = 1;
$credentials['senderName'] = 'Jose Comprador';
$credentials['senderCPF'] = '11475714734';
$credentials['senderHash'] = $params->senderhash;
$credentials['creditCardToken'] = $params->cardtoken;

$credentials = http_build_query($credentials);

$curl = curl_init($url);
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