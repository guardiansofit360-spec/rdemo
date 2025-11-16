<?php
header('Content-Type: application/json');

$category = $_GET['category'] ?? 'all';

// Load menu items
$menuItems = json_decode(file_get_contents('../data/menu.json'), true);

if ($category !== 'all') {
    $menuItems = array_filter($menuItems, function($item) use ($category) {
        return $item['category'] === $category;
    });
    $menuItems = array_values($menuItems);
}

echo json_encode(['success' => true, 'items' => $menuItems]);
