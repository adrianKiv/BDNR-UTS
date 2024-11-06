<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Include JWT library
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Set header for JSON response
header('Content-Type: application/json');

// Read Authorization header
$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? '';

if (strpos($authHeader, 'Bearer ') !== 0) {
    echo json_encode(['success' => false, 'error' => 'Token missing or invalid.']);
    exit;
}

// Extract the token
$token = str_replace('Bearer ', '', $authHeader);

$secretKey = 'keylamkivRelle'; // Use the same key for signing JWTs

try {
    // Decode and verify the token
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));

    // If token is valid, return success
    echo json_encode(['success' => true, 'message' => 'Token is valid.']);
} catch (Exception $e) {
    // If token is invalid, return error
    echo json_encode(['success' => false, 'error' => 'Invalid token: ' . $e->getMessage()]);
}
?>
