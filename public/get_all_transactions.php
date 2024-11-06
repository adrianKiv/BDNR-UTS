<?php
require_once __DIR__ . '/../config/database.php';
$db = new Database();

// Define the collections for purchase history, products, and users
$purchaseHistoryCollection = $db->getCollection("Transactions");
$productCollection = $db->getCollection("Products");
$userCollection = $db->getCollection("Users");

try {
    // Find all purchase histories
    $purchases = $purchaseHistoryCollection->find();

    $allPurchaseData = [];

    foreach ($purchases as $purchase) {
        // Fetch detailed product information for each product in the purchase
        $products = array_map(function ($product) use ($productCollection) {
            // Find the product details in the Products collection
            $productDetails = $productCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($product['productId'])]);

            return [
                'productId' => (string)$product['productId'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'name' => $productDetails['name'] ?? 'Unknown', // Fetch name if available
                'images' => $productDetails['images'] ?? [],   // Fetch images if available
            ];
        }, $purchase['products']->getArrayCopy());

        // Fetch user details for the associated userId
        $userDetails = $userCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($purchase['userId'])]);

        $user = [
            'userId' => (string)$purchase['userId'],
            'username' => $userDetails['username'] ?? 'Unknown',
            'email' => $userDetails['email'] ?? 'Unknown',
            'phone' => $userDetails['phone'] ?? 'Unknown',
            'role' => $userDetails['role'] ?? 'Unknown',
        ];

        // Structure each purchase data entry
        $allPurchaseData[] = [
            '_id' => (string)$purchase['_id'],
            'user' => $user, // Include user details
            'products' => $products,
            'totalAmount' => $purchase['totalAmount'],
            'orderStatus' => $purchase['orderStatus'],
            'orderDate' => $purchase['orderDate']->toDateTime()->format('Y-m-d H:i:s'),
            'deliveryDate' => $purchase['deliveryDate'] ? $purchase['deliveryDate']->toDateTime()->format('Y-m-d H:i:s') : null,
            'shippingAddress' => $purchase['shippingAddress'],
            'payment' => [
                'method' => $purchase['payment']['paymentMethod'],
                'paymentStatus' => $purchase['payment']['paymentStatus'],
                'paymentDate' => $purchase['payment']['paymentDate']->toDateTime()->format('Y-m-d H:i:s'),
            ]
        ];
    }

    // Return the JSON response
    echo json_encode($allPurchaseData);

} catch (Exception $e) {
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
}
?>
