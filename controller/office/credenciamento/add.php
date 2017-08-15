<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

try {
    if (!isset(
        $params->presenca,
        $_SESSION['congresso_uid']
    )) {
        throw new Exception('Verifique os dados preenchidos', 400);
    }

    $oConexao->beginTransaction();

    switch ($params->presenca) {
        case 1:
            $data = date('Y-m-d h:i:s');
            break;
        case 2:
            $data = date('Y-m-d h:i:s');
            break;
        case 3:
            $data = date('Y-m-d h:i:s');
            break;
        case 4:
            $data = date('Y-m-d h:i:s');
            break;
    }

    $stmt = $oConexao->prepare(
        'INSERT INTO 
            credenciamento(
                idusuario,material,ip,created_at
            ) VALUES(
                ?,?,?,?
            )');
    $stmt->execute(array(
        $_SESSION['congresso_uid'],
        $params->material,
        $_SERVER['REMOTE_ADDR'],
        $data
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
