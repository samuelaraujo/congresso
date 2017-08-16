<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

try {
    if (!isset(
        $_POST['id']
    )) {
        throw new Exception('Verifique os dados preenchidos', 400);
    }

    $oConexao->beginTransaction();

    //params
    $entrada = isset($_POST['entrada']) 
                        ? date('Y-m-d h:i:s') 
                        : null;

    $saida = isset($_POST['saida']) 
                        ? date('Y-m-d h:i:s')
                        : null;

    $material = isset($_POST['material']) 
                        ? $_POST['material'] 
                        : null;

    $stmt = $oConexao->prepare(
        'INSERT INTO 
            credenciamento(
                idusuario,material,entrada,saida,created_at
            ) VALUES(
                ?,?,?,?,now()
            )');
    $stmt->execute(array(
        $_POST['id'],
        $material,
        $entrada,
        $saida
    )); 

    $oConexao->commit();

    http_response_code(200);
    $response->success = 'Cadastrado com sucesso';
} catch (PDOException $e) {
    //echo $e->getMessage();
    http_response_code(500);
    $oConexao->rollBack();
    $response->error = 'Desculpa. Tivemos um problema, tente novamente mais tarde: '. $e->getMessage();
} catch (Exception $e) {
    http_response_code($e->getCode());
    $response->error = $e->getMessage();
}

echo json_encode($response);
