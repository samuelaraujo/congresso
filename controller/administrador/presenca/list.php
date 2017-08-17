<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();
$response->count = array('ativos' => 0, 'inativos' => 0);

try {
    $offset = isset($params->offset) && $params->offset > 0
                        ? $params->offset
                        : 0;
    $limit = isset($params->limit) && $params->limit < 200
                        ? $params->limit
                        : 200;

    switch ($params->status) {
        case 1:
            $status = '2017-08-14 15:00:00';
            break;
        case 2:
            $status = '2017-08-15 17:00:00';
            break;
        case 3:
            $status = '2017-08-16 17:00:00';
            break;
        case 4:
            $status = '2017-08-17 17:00:00';
            break;
    }

    $search = isset($params->search[0])
                        ? ' AND
                                (
                                    c.nome LIKE :query OR
                                    c.cpf LIKE :query
                                )
                            '
                        : null;

    $stmt = $oConexao->prepare(
        'SELECT
            cd.id,c.nome,UPPER(CONCAT(c.nome,\' \', c.sobrenome)) cliente,c.cpf,
            DATE_FORMAT(cd.created_at, "%d/%m/%Y") created_at,cd.material,
            i.nome ingresso,p.valor,p.codigo,p.metodo,p.status
        FROM usuario c
        INNER JOIN credenciamento cd ON(c.id=cd.idusuario)
        INNER JOIN pagamento p ON c.id=p.idusuario
        INNER JOIN ingresso i ON i.id = p.idingresso
        WHERE cd.created_at=:status '.$search.'
        ORDER BY cd.id DESC
        LIMIT :offset,:limit'
    );
    $stmt->bindParam('offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam('limit', $limit, PDO::PARAM_INT);

    if (isset($params->search[0])) {
        $query = '%'.$params->search.'%';
        $stmt->bindParam('query', $query);
    }

    $stmt->bindParam('status', $status, PDO::PARAM_INT);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $count = $oConexao->prepare(
        'SELECT
            COUNT(*)
        FROM usuario c
        INNER JOIN credenciamento cd ON(c.id=cd.idusuario)
        INNER JOIN pagamento p ON c.id=p.idusuario
        INNER JOIN ingresso i ON i.id = p.idingresso
        WHERE cd.created_at=:status '.$search
    );

    if (isset($params->search[0])) {
        $query = '%'.$params->search.'%';
        $count->bindParam('query', $query);
    }

    $count->bindParam('status', $status);
    $count->execute();
    $count_results = $count->fetchColumn();

    $status = '2017-08-14 15:00:00';
    $count->bindParam('status', $status);
    $count->execute();
    $count_primeiro_dia = $count->fetchColumn();

    $status = '2017-08-15 17:00:00';
    $count->bindParam('status', $status);
    $count->execute();
    $count_segundo_dia = $count->fetchColumn();

    $status = '2017-08-16 17:00:00';
    $count->bindParam('status', $status);
    $count->execute();
    $count_terceiro_dia = $count->fetchColumn();

    $status = '2017-08-17 17:00:00';
    $count->bindParam('status', $status);
    $count->execute();
    $count_quarto_dia = $count->fetchColumn();

    http_response_code(200);
    $response = array(
        'results' => $results,
        'count' => array(
            'results' => $count_results,
            'primeiro_dia' => $count_primeiro_dia,
            'segundo_dia' => $count_segundo_dia,
            'terceiro_dia' => $count_terceiro_dia,
            'quarto_dia' => $count_quarto_dia
        ),
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
