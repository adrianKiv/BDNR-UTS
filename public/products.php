<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/database.php';

$db = new Database();
$collectionName = "Products";
$dataCursor = $db->getData($collectionName);

$productsData = [];
foreach ($dataCursor as $document) {
    $productsData[] = [
        'id' => (string)$document['_id'], // Convert ObjectId to string
        'name' => $document['name'], 
        'images' => $document['images'],
        'price' => $document['price'],
        'category' => $document['category'],
        'description' => $document['description'] ?? 'No description available', // Optional description
        'stock' => $document['stock'] ?? 0, // Default stock to 0 if not available
        'createdAt' => isset($document['createdAt']) ? $document['createdAt']->toDateTime()->format('Y-m-d H:i:s') : null,
        'updatedAt' => isset($document['updatedAt']) ? $document['updatedAt']->toDateTime()->format('Y-m-d H:i:s') : null,
        'specifications' => $document['specifications'] ?? [], // Ensure specifications are available
    ];
}

echo json_encode($productsData);

?>
