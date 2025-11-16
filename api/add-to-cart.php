<?php
header('Content-Type: application/json');
session_start();

$data = json_decode(file_get_contents('php://input'), true);
$itemId = $data['itemId'] ?? null;

if (!$itemId) {
    echo json_encode(['success' => false, 'message' => 'Invalid item ID']);
    exit;
}

// Load menu items
$menuItems = json_decode(file_get_contents('../data/menu.json'), true);
$item = array_filter($menuItems, function($i) use ($itemId) {
    return $i['id'] == $itemId;
});

if (empty($item)) {
    echo json_encode(['success' => false, 'message' => 'Item not found']);
    exit;
}

// Initialize cart in session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add or update item in cart
$found = false;
foreach ($_SESSION['cart'] as &$cartItem) {
    if ($cartItem['id'] == $itemId) {
        $cartItem['quantity']++;
        $found = true;
        break;
    }
}

if (!$found) {
    $item = array_values($item)[0];
    $_SESSION['cart'][] = [
        'id' => $item['id'],
        'name' => $item['name'],
        'price' => $item['price'],
        'image' => $item['image'],
        'quantity' => 1
    ];
}

echo json_encode(['success' => true, 'message' => 'Item added to cart']);
