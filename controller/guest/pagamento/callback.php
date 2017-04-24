<?php
	
use Utils\Conexao;

header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
header('Content-type: application/json');
$oConexao = Conexao::getInstance();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
		//configurações
		$codigo = $_POST['notificationCode'];
		$url = notificationsURL.'/'.$codigo.'?email='.PAGSEURO_EMAIL.'&token='.PAGSEURO_TOKEN;
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		
		$xml = curl_exec($curl);

		if($xml == 'Unauthorized'){
			/*enviar e-mail para o administrador*/
			exit();
		}else{
			//objeto
			$results = simplexml_load_string($xml);
			$results = json_decode(json_encode($results));

			//pagamento
			$stmt = $oConexao->prepare(
			    'UPDATE pagamento SET status=?,updated_at=now() WHERE codigo=?'
			);
			$stmt->execute(array(
			    $results->status,
			    $results->code
			));
		}

	}
}