<?php

use Utils\Conexao;

header('Content-type: application/json');
$oConexao = Conexao::getInstance();
$params = json_decode(file_get_contents('php://input'));
$response = new stdClass();
$response->count = array('ativos' => 0, 'inativos' => 0, 'arquivados' => 0);

try {
    $offset = isset($params->offset) && $params->offset > 0
                        ? $params->offset
                        : 0;
    $limit = isset($params->limit) && $params->limit < 200
                        ? $params->limit
                        : 200;

    $status = isset($params->status)
                        ? $params->status
                        : 1;

    $search = isset($params->search[0])
                        ? ' AND
								(
									p.codigo LIKE :query OR
									c.nome LIKE :query OR
									c.cpf LIKE :query
								)
							'
                        : null;

    $stmt = $oConexao->prepare(
        'SELECT
            CONCAT(c.nome,\' \', c.sobrenome) cliente,c.cpf,i.nome ingresso,p.id,p.valor,p.codigo,p.metodo,p.status,p.link
        FROM pagamento p
        INNER JOIN usuario c ON c.id = p.idusuario
        INNER JOIN ingresso i ON i.id = p.idingresso
        WHERE p.status = :status' .' '.$search.'
		ORDER BY p.id DESC
        LIMIT :offset,:limit'
    );
    $stmt->bindParam('offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam('limit', $limit, PDO::PARAM_INT);

    if (isset($params->search[0])) {
        $query = '%'.$params->search.'%';
        $stmt->bindParam('query', $query);
    }

    //$status = 1;
    $stmt->bindParam('status', $status, PDO::PARAM_INT);

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $count = $oConexao->prepare(
        'SELECT
			COUNT(*)
		FROM pagamento p
        INNER JOIN usuario c ON c.id = p.idusuario
        INNER JOIN ingresso i ON i.id = p.idingresso
		WHERE p.status = :status' .' '.$search
    );

    if (isset($params->search[0])) {
        $query = '%'.$params->search.'%';
        $count->bindParam('query', $query);
    }

    $count->bindParam('status', $status);
    $count->execute();
    $count_results = $count->fetchColumn();

    $status = 1;
    $count->bindParam('status', $status);
    $count->execute();
    $count_pagas = $count->fetchColumn();

    $status = 2;
    $count->bindParam('status', $status);
    $count->execute();
    $count_pendentes = $count->fetchColumn();

    $status = 3;
    $count->bindParam('status', $status);
    $count->execute();
    $count_cancelados = $count->fetchColumn();

    $status = 4;
    $count->bindParam('status', $status);
    $count->execute();
    $count_estornados = $count->fetchColumn();

    http_response_code(200);
    $response = array(
        'results' => $results,
        'count' => array(
            'results' => $count_results,
            'pagas' => $count_pagas,
            'pendentes' => $count_pendentes,
            'cancelados' => $count_cancelados,
            'estornados' => $count_estornados
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
