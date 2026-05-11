<?php

require '../config/cors.php';

header('Content-Type: application/json');
require '../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "UPDATE produtos
        SET nome = :nome,
            quantidade = :quantidade,
            preco = :preco
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $data['id'],
    ':nome' => $data['nome'],
    ':quantidade' => $data['quantidade'],
    ':preco' => $data['preco']
]);

echo json_encode([
    'mensagem' => 'Produto atualizado'
]);
?>
