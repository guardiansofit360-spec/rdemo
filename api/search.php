<?php
header('Content-Type: application/json');

$query = $_GET['q'] ?? '';

if (empty($query)) {
    echo json_encode(['success' => false, 'items' => []]);
    exit;
}

// Load menu items
$menuItems = json_decode(file_get_contents('../data/menu.json'), true);

// Filter by search query
$results = array_filter($menuItems, function($item) use ($query) {
    return stripos($item['name'], $query) !== false || 
           stripos($item['restaurant'], $query) !== false ||
           stripos($item['category'], $query) !== false;
});

echo json_encode(['success' => true, 'items' => array_values($results)]);
