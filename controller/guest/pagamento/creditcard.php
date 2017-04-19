<?php
	
use Utils\Conexao;

header('Content-type: application/json');
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

//configurações
$url = transactionsURL;
$credentials['email'] = PAGSEURO_EMAIL;
$credentials['token'] = PAGSEURO_TOKEN;
$credentials['paymentMode'] = 'default';
$credentials['currency'] = 'BRL';
$credentials['notificationURL'] = URL_APP.'/controller/guest/pagamento/callback';
$credentials['paymentMethod'] = 'creditCard';
$credentials['receiverEmail'] = 'suporte@lojamodelo.com.br';

//itens
$credentials['itemId1'] = '0001';
$credentials['itemDescription1'] = 'Produto de teste';
$credentials['itemAmount1'] = '80.00';
$credentials['itemQuantity1'] = 1;

//dados do comprador
$credentials['senderName'] = $params->portador;
$credentials['senderCPF'] = $params->usuario->cpf;
$credentials['senderAreaCode'] = '68';
$credentials['senderPhone'] = '21025035';
$credentials['senderEmail'] = $params->usuario->email;
$credentials['senderHash'] = $params->senderhash;
$credentials['creditCardToken'] = $params->cardtoken;

//endereço do cliente
$credentials['shippingAddressStreet'] = 'R Bartolomeu Bueno';
$credentials['shippingAddressNumber'] = 33;
$credentials['shippingAddressComplement'] = 'Sala A';
$credentials['shippingAddressDistrict'] = 'Bosque';
$credentials['shippingAddressPostalCode'] = '69900541';
$credentials['shippingAddressCity'] = 'Rio branco';
$credentials['shippingAddressState'] = 'ACRE';
$credentials['shippingAddressCountry'] = 'Brasil';

//endereço de pagamento
$credentials['billingAddressStreet'] = = 'R Bartolomeu Bueno';
$credentials['billingAddressNumber'] = 33
$credentials['billingAddressDistrict'] = 'Sala A';
$credentials['billingAddressPostalCode'] = 'Bosque';
$credentials['billingAddressCity'] = '69900541';
$credentials['billingAddressState'] = $order_info['payment_zone_code'];
$credentials['billingAddressCountry'] = $order_info['payment_iso_code_3'];

$credentials = http_build_query($credentials);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, 
	Array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1')
);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $credentials);
$xml = curl_exec($curl);
$results = simplexml_load_string($xml);

print_r($results);
	
// if( count($results->error) > 0 ){
// 	http_response_code(500);
// 	$response->error = 'Ocorreu um erro na requisição(session) de pagamento';
// 	die();
// }

// http_response_code(200);
// $response = array(
//     'results' => $results
// );

// echo json_encode($response);


/*

https://github.com/samuelaraujo/agendeseuservico/blob/master/php/assinatura/assinatura-boletobancario.php

https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/posts/115001055207-Pagamento-recorrente-transparente

https://pt.stackoverflow.com/questions/39722/recebimento-do-id-de-inicio-de-sess%C3%A3o

https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/posts/115000810047-Por-favor-me-RESPONDAM-

https://github.com/opencart-extension/PagSeguro-Checkout-Transparente/blob/master/upload/catalog/view/theme/default/template/extension/payment/pagseguro_cartao.tpl

https://github.com/opencart-extension/PagSeguro-Checkout-Transparente/blob/master/upload/catalog/controller/extension/payment/pagseguro_cartao.php

http://download.uol.com.br/pagseguro/docs/pagseguro-checkout-transparente.pdf

*/