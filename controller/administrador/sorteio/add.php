<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

try {

    $oConexao->beginTransaction();

    $stmt = $oConexao->prepare(
        'SELECT c.id,UPPER(CONCAT(c.nome,\' \',c.sobrenome)) cliente
        FROM usuario c
        INNER JOIN pagamento p ON p.idusuario=c.id
        WHERE c.gestor=0
        AND p.status=3
        ORDER BY RAND() LIMIT 1'
    );

    $stmt->execute();
    $results = $stmt->fetchObject();

    if (!$results) {
        throw new Exception('Não encontrado', 404);
    }

    $stmt = $oConexao->prepare(
        'INSERT INTO 
            sorteio(
                idusuario,created_at
            ) VALUES(
                ?,now()
            )');
    $stmt->execute(array(
        $results->id
    )); 

    $oConexao->commit();

    http_response_code(200);
    $response->success = 'Cadastrado com sucesso';
    $response->results = $results;

} catch (PDOException $e) {
    //echo $e->getMessage();
    http_response_code(500);
    $response->error = 'Desculpa. Tivemos um problema, tente novamente mais tarde';
} catch (Exception $e) {
    http_response_code($e->getCode());
    $response->error = $e->getMessage();
}

echo json_encode($response);
