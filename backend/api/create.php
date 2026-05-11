<?php
require '../config/cors.php';

header('Content-Type: application/json');
require '../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO produtos (nome, quantidade, preco)
        VALUES (:nome, :quantidade, :preco)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $data['nome'],
    ':quantidade' => $data['quantidade'],
    ':preco' => $data['preco']
]);

echo json_encode([
    'mensagem' => 'Produto cadastrado com sucesso'
]);
