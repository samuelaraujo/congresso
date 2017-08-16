<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

try {
    
    if (!isset(
        $params->id
    )) {
        throw new Exception('Verifique os dados preenchidos', 400);
    }

    //params default
    $params->data = date('Y-m-d');

    $stmt = $oConexao->prepare(
        'SELECT 
            COUNT(*)
        FROM credenciamento
        WHERE idusuario=?
        AND DATE_FORMAT(entrada, "%Y-%m-%d")=?'
    );

    $stmt->execute(array(
        $params->id,
        $params->data
    ));
    $results = $stmt->fetchColumn();

    http_response_code(200);
    $response = array(
        'count' => array(
            'results' => $results
        )
    );
} catch (PDOException $e) {
    //echo $e->getMessage();
    http_response_code(500);
    $response->error = 'Desculpa. Tivemos um problema, tente novamente mais tarde';
} catch (Exception $e) {
    http_response_code($e->getCode());
    $response->error = $e->getMessage();
}

echo json_encode($response);
