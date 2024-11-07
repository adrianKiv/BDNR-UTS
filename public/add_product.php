<?php
require_once __DIR__ . '/../config/database.php';
$db = new Database();

// Tentukan direktori tempat menyimpan gambar
$imageDirectory = 'images/';  // Path relatif, tidak perlu path lengkap karena akan disimpan relatif

// Mendapatkan waktu saat ini (timestamp)
$currentTimestamp = new MongoDB\BSON\UTCDateTime(); // Menggunakan MongoDB UTCDateTime untuk waktu yang tepat

// Validasi data form
if (isset($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_POST['specifications'], $_POST['stock']) && !empty($_FILES['images'])) {
    $imagePaths = [];
    
    // Proses setiap gambar yang diunggah
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
        // Validasi upload gambar
        if ($_FILES['images']['error'][$index] != UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'error' => 'Terjadi kesalahan saat mengunggah file.']);
            exit;
        }

        // Periksa ukuran file dan tipe file
        if ($_FILES['images']['size'][$index] > 5 * 1024 * 1024) {
            echo json_encode(['success' => false, 'error' => 'Ukuran file terlalu besar.']);
            exit;
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['images']['type'][$index], $allowedTypes)) {
            echo json_encode(['success' => false, 'error' => 'Tipe file tidak didukung.']);
            exit;
        }

        // Nama asli file gambar
        $originalName = $_FILES['images']['name'][$index];

        // Membuat nama file yang unik
        $uniqueName = uniqid() . '-' . basename($originalName);
        
        // Tentukan path file yang akan disimpan
        $destination = __DIR__ . '/../images/' . $uniqueName; // Penyimpanan gambar di server
        
        // Pindahkan file ke folder /images
        if (move_uploaded_file($tmpName, $destination)) {
            // Simpan path relatif gambar (misalnya /images/nama_gambar.jpg)
            $imagePaths[] = $imageDirectory . $uniqueName;
        } else {
            echo json_encode(['success' => false, 'error' => 'Gagal mengunggah gambar.']);
            exit;
        }
    }

    // Pisahkan specifications dari input menjadi array
    $specifications = $_POST['specifications'];

    // Siapkan data produk untuk disimpan di database
    $productData = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => (float)$_POST['price'],
        'category' => $_POST['category'],
        'stock' => $_POST['stock'],
        'images' => $imagePaths, // Menyimpan path relatif gambar di array
        'specifications' => $specifications, // Simpan sebagai array
        'createdAt' => $currentTimestamp, // Menambahkan waktu saat produk dibuat
        'updatedAt' => $currentTimestamp  // Menambahkan waktu saat produk dibuat (untuk pembaruan pertama)
    ];

    // Masukkan data ke koleksi "Products"
    $productCollection = $db->getCollection("Products");
    $insertResult = $productCollection->insertOne($productData);

    if ($insertResult->getInsertedCount() > 0) {
        echo json_encode(['success' => true, 'productId' => (string) $insertResult->getInsertedId()]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Gagal menambahkan produk ke database.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Data produk tidak lengkap.']);
}
?>
