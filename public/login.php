<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php'; // Include JWT library

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$db = new Database();

// Set header for JSON response
header('Content-Type: application/json');

// Read JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Extract login details with null coalescing to handle undefined indexes
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

// JWT Secret Key
$secretKey = 'keylamkivRelle'; 

// Find user by email
$userCollection = $db->getCollection("Users");
$user = $userCollection->findOne(['email' => $email]);

if ($user) {
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Create payload for the token
        $payload = [
            'iss' => 'your-website.com', // Issuer
            'aud' => 'your-website.com', // Audience
            'iat' => time(), // Issued at
            'exp' => time() + 3600, // Expiry time (1 hour)
            'userId' => (string)$user['_id'], // User ID
            'role' => $user['role'], // Role for authorization
        ];

        // Generate JWT token
        $jwt = JWT::encode($payload, $secretKey, 'HS256');

        // Return response with token
        echo json_encode([
            'success' => true,
            'message' => 'Login successful',
            'token' => $jwt, // Include the JWT token
            'user' => [
                'id' => (string)$user['_id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'role' => $user['role']
            ]
        ]);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'error' => 'Invalid email or password.']);
    }
} else {
    // User not found
    echo json_encode(['success' => false, 'error' => 'User not found.']);
}
?>
