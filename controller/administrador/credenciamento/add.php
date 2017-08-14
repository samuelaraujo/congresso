<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();

try {
    if (!isset(
        $_POST['id'],
        $_POST['material']
    )) {
        throw new Exception('Verifique os dados preenchidos', 400);
    }

    $oConexao->beginTransaction();

    $count_dia = isset($_POST['presenca']) 
                            ? sizeof($_POST['presenca']) 
                            : 0;

    for($i=0; $i<$count_dia; $i++){

        //params
        $dia = $_POST['presenca'][$i];

        switch ($dia) {
            case 1:
                $data = '2017-08-14 15:00:00';
                break;
            case 2:
                $data = '2017-08-15 17:00:00';
                break;
            case 3:
                $data = '2017-08-16 17:00:00';
                break;
            case 4:
                $data = '2017-08-17 17:00:00';
                break;
        }

        $stmt = $oConexao->prepare(
            'INSERT INTO 
                credenciamento(
                    idusuario,material,created_at
                ) VALUES(
                    ?,?,?
                )');
        $stmt->execute(array(
            $_POST['id'],
            $_POST['material'],
            $data
        )); 

    }

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
