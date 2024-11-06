<?php
require_once __DIR__ . '/../config/database.php';
$db = new Database();

// Set header for JSON response
header('Content-Type: application/json');

// Read JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (empty($data['username']) || empty($data['email']) || empty($data['phone']) || empty($data['password'])) {
    echo json_encode(['success' => false, 'error' => 'All fields are required.']);
    exit;
}

$username = $data['username'];
$email = $data['email'];
$phone = $data['phone'];
$password = password_hash($data['password'], PASSWORD_DEFAULT); // Hash the password

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Invalid email format.']);
    exit;
}

// Validate phone number format
if (!preg_match('/^\d{10,15}$/', $phone)) {
    echo json_encode(['success' => false, 'error' => 'Invalid phone number format.']);
    exit;
}

// Check if email or username already exists
$userCollection = $db->getCollection("Users");
$existingUser = $userCollection->findOne(['email' => $email]);
$existingUsername = $userCollection->findOne(['username' => $username]);

if ($existingUser) {
    echo json_encode(['success' => false, 'error' => 'Email already exists.']);
    exit;
}

if ($existingUsername) {
    echo json_encode(['success' => false, 'error' => 'Username already exists.']);
    exit;
}

// Insert new user
$newUser = [
    'username' => $username,
    'email' => $email,
    'phone' => $phone,
    'password' => $password,
    'role' => 'user', // Default role
    'createdAt' => new MongoDB\BSON\UTCDateTime(),
    'updatedAt' => new MongoDB\BSON\UTCDateTime(),
    'auth' => '', // Auth field remains empty
];

try {
    $userCollection->insertOne($newUser);
    echo json_encode(['success' => true, 'message' => 'Account created successfully.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to create account: ' . $e->getMessage()]);
}
?>
