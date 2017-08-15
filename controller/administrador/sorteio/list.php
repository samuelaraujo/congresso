<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

try {

    $stmt = $oConexao->prepare(
        'SELECT
            s.id,s.created_at,UPPER(CONCAT(c.nome,\' \', c.sobrenome)) cliente,c.cpf
        FROM usuario c
        INNER JOIN sorteio s ON c.id = s.idusuario
        ORDER BY s.id DESC LIMIT 0,20'
    );
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$results){
        throw new Exception('Não resultado encontrado', 404);
    }

    $count = 0;
    $itens = array();

    foreach($results as $result){
        $itens[$count]['id'] = $result['id'];
        $itens[$count]['created_at'] = calculatortimestamp(strtotime($result['created_at']));
        $itens[$count]['cliente'] = $result['cliente'];
        $itens[$count]['cpf'] = $result['cpf'];
        
        $count++;
    }

    http_response_code(200);
    $response = array(
        'results' => $itens
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
