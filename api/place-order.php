<?php
header('Content-Type: application/json');
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (empty($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Cart is empty']);
    exit;
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
$total += 2.50; // Delivery fee

// Create order
$order = [
    'id' => uniqid(),
    'date' => date('Y-m-d H:i:s'),
    'items' => $_SESSION['cart'],
    'total' => $total,
    'delivery_address' => $data['address'] ?? '',
    'city' => $data['city'] ?? '',
    'zip' => $data['zip'] ?? '',
    'name' => $data['name'] ?? '',
    'phone' => $data['phone'] ?? '',
    'payment_method' => $data['payment'] ?? 'card',
    'status' => 'pending'
];

// Load existing orders
$ordersFile = '../data/orders.json';
$orders = json_decode(file_get_contents($ordersFile), true);
$orders[] = $order;

// Save orders
file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT));

// Clear cart
$_SESSION['cart'] = [];

echo json_encode(['success' => true, 'order_id' => $order['id']]);
