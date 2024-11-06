<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/database.php';

// Inisialisasi koneksi database
$db = new Database();
$collectionName = "PurchaseHistory";

// Mendapatkan data dari request
$input = json_decode(file_get_contents("php://input"), true);

// Validasi input
if (!isset($input['id']) || !isset($input['newStatus'])) {
    echo json_encode(['error' => 'ID and new status are required']);
    exit;
}

$id = $input['id'];
$newStatus = $input['newStatus'];

try {
    // Pastikan ID adalah ObjectId yang valid
    $objectId = new MongoDB\BSON\ObjectId($id);

    // Update status di database
    $result = $db->getCollection($collectionName)->updateOne(
        ['_id' => $objectId], // Filter berdasarkan _id
        ['$set' => ['payment.paymentStatus' => $newStatus]] // Update hanya payment.paymentStatus
    );

    if ($result->getMatchedCount() === 0) {
        echo json_encode(['error' => 'No matching ID found']);
        exit;
    }

    if ($result->getModifiedCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Payment status updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Payment status unchanged']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
}
?>
