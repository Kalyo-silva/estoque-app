<?php

require '../config/cors.php';

header('Content-Type: application/json');
require '../config/database.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";
$stmt = $pdo->query($sql);

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($produtos);
