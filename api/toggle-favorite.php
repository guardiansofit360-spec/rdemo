<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$itemId = $data['itemId'] ?? null;

if (!$itemId) {
    echo json_encode(['success' => false, 'message' => 'Invalid item ID']);
    exit;
}

// Load favorites
$favoritesFile = '../data/favorites.json';
$favorites = json_decode(file_get_contents($favoritesFile), true);

// Toggle favorite
$key = array_search($itemId, $favorites);
if ($key !== false) {
    unset($favorites[$key]);
    $favorites = array_values($favorites);
    $message = 'Removed from favorites';
} else {
    $favorites[] = $itemId;
    $message = 'Added to favorites';
}

// Save favorites
file_put_contents($favoritesFile, json_encode($favorites, JSON_PRETTY_PRINT));

echo json_encode(['success' => true, 'message' => $message]);
