<?php
header('Content-Type: application/json');
session_start();

$data = json_decode(file_get_contents('php://input'), true);
$index = $data['index'] ?? null;

if ($index === null || !isset($_SESSION['cart'][$index])) {
    echo json_encode(['success' => false, 'message' => 'Invalid item']);
    exit;
}

unset($_SESSION['cart'][$index]);
$_SESSION['cart'] = array_values($_SESSION['cart']);

echo json_encode(['success' => true]);
