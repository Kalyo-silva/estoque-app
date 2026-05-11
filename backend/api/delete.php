<?php

require '../config/cors.php';

header('Content-Type: application/json');
require '../config/database.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "DELETE FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $data['id']
]);

echo json_encode([
    'mensagem' => 'Produto removido'
]);
?>
