<?php
	
use Utils\Conexao;

// header('Content-type: application/json');
// $response = new stdClass();

// try {

	$credentials['email'] = 'suporte@lojamodelo.com.br';
	$credentials['token'] = '57BE455F4EC148E5A54D9BB91C5AC12C';

	$sessionURL = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=suporte@lojamodelo.com.br&token=57BE455F4EC148E5A54D9BB91C5AC12C';

	$credentials = http_build_query($credentials);
	// $curl = curl_init();

	// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($curl, CURLOPT_POST, true);
	// curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	// curl_setopt($curl, CURLOPT_POSTFIELDS, $credentials);

	$curl = curl_init($sessionURL);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, 
		Array('Content-Type: application/xml; charset=ISO-8859-1')
	);
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $credentials);
	$xml = curl_exec($curl);

	echo $xml;
	print_r($xml);

	// $xml = curl_exec($curl);
	$results = simplexml_load_string($xml);

	print_r($results);
	
	// if( count($results->error) > 0 ){
	// 	throw new Exception('Ocorreu um erro na requisição(session) de pagamento', 500);

	// http_response_code(200);
 //    $response->success = $results->session->id;
 //    $response->session = $results->session;

// } catch (Exception $e) {
//     http_response_code($e->getCode());
//     $response->error = $e->getMessage();
// }

// echo json_encode($response);


// https://github.com/samuelaraujo/agendeseuservico/blob/master/php/financeiro/cancelar-transacao.php

	https://sounoob.com.br/criando-uma-requisicao-de-pagamento-do-pagseguro-via-xml-usando-php-sem-utilizar-a-biblioteca-oficial/


	https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/posts/115001055207-Pagamento-recorrente-transparente


	https://pt.stackoverflow.com/questions/39722/recebimento-do-id-de-inicio-de-sess%C3%A3o


	https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/posts/115000810047-Por-favor-me-RESPONDAM-

	https://www.google.com.br/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=curl+session+pagseguro+jquery