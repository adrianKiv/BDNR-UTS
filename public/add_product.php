<?php
require_once __DIR__ . '/../config/database.php';
$db = new Database();

// Direktori penyimpanan gambar
$imageDirectory = 'images/'; 

// Mendapatkan waktu saat ini
$currentTimestamp = new MongoDB\BSON\UTCDateTime();

// Validasi data form
if (
    isset($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $_POST['specifications'], $_POST['stock']) &&
    isset($_FILES['images']) && count($_FILES['images']['tmp_name']) === 2  // Memastikan dua gambar diunggah
) {
    $imagePaths = [];

    // Proses setiap gambar
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
        // Validasi upload gambar
        if ($_FILES['images']['error'][$index] != UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'error' => 'Terjadi kesalahan saat mengunggah file.']);
            exit;
        }

        // Periksa ukuran file (maks 5MB) dan tipe file yang diizinkan
        if ($_FILES['images']['size'][$index] > 5 * 1024 * 1024) {
            echo json_encode(['success' => false, 'error' => 'Ukuran file terlalu besar.']);
            exit;
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['images']['type'][$index], $allowedTypes)) {
            echo json_encode(['success' => false, 'error' => 'Tipe file tidak didukung.']);
            exit;
        }

        // Nama file yang unik
        $originalName = $_FILES['images']['name'][$index];
        $uniqueName = uniqid() . '-' . basename($originalName);
        
        // Path penyimpanan file
        $destination = __DIR__ . '/../images/' . $uniqueName;
        
        // Pindahkan file ke folder /images
        if (move_uploaded_file($tmpName, $destination)) {
            // Simpan path relatif gambar
            $imagePaths[] = $imageDirectory . $uniqueName;
        } else {
            echo json_encode(['success' => false, 'error' => 'Gagal mengunggah gambar.']);
            exit;
        }
    }

    // Konversi specifications menjadi array
    $specifications = $_POST['specifications'];

    // Siapkan data produk untuk disimpan di database
    $productData = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => (float)$_POST['price'],
        'category' => $_POST['category'],
        'stock' => (int)$_POST['stock'],
        'images' => $imagePaths,  // Menyimpan path relatif gambar dalam array
        'specifications' => $specifications,
        'createdAt' => $currentTimestamp,
        'updatedAt' => $currentTimestamp
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
    echo json_encode(['success' => false, 'error' => 'Data produk tidak lengkap atau jumlah gambar tidak sesuai.']);
}
?>
