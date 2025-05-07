<?php
$activepage = 'dashboardproduct';
include 'partial/dashboard/navbar.php';
?>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box mb-30 pd-30">
            <h2>Form Tambah Produk</h2>
            <br>
            <br>
            <form id="productForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Harga Produk</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>

                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Handphone">HandPhone</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Smart Watch">SmartWatch</option>
                        <option value="Headset & friends">Headset</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="Charger">Charger</option>
                        <option value="Disk">Disk</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" required>
                </div>

                <div class="form-group">
                    <label for="images1">Gambar Produk untuk Halaman Depan</label>
                    <input type="file" class="form-control" id="images1" name="images1" required>
                </div>
                <div class="form-group">
                    <label for="images2">Gambar Produk untuk Halaman Detail</label>
                    <input type="file" class="form-control" id="images2" name="images2" required>
                </div>
                <br>


                <h4>Spesifikasi Produk</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenisLayar">Spesifikasi 1</label>
                            <input type="text" class="form-control" id="jenisLayar" name="jenisLayar">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="camera">Spesifikasi 2</label>
                            <input type="text" class="form-control" id="camera" name="camera">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="processor">Spesifikasi 3</label>
                            <input type="text" class="form-control" id="processor" name="processor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baterai">Spesifikasi 4</label>
                            <input type="text" class="form-control" id="baterai" name="baterai">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
                </div>
            </form>
            <div id="result" class="mt-3"></div>
        </div>
<?php
$activepage = 'dashboardproduct';
include 'partial/dashboard/footer.php';
?>
    </div>
</div>

<script src="vendors/scripts/core.js"></script>

<script>
    function submitForm(event) {
        event.preventDefault(); // Mencegah pengiriman form bawaan

        const form = document.getElementById('productForm');
        const formData = new FormData(form);


        // Tambahkan setiap gambar ke formData sebagai array
        // Tambahkan setiap file gambar ke formData
        formData.append("images[]", document.getElementById('images1').files[0]); // Gambar 1: Halaman depan
        formData.append("images[]", document.getElementById('images2').files[0]); // Gambar 2: Halaman detail

        // Tambahkan spesifikasi produk sebagai array ke formData
        formData.append("specifications[]", document.getElementById('jenisLayar').value);
        formData.append("specifications[]", document.getElementById('camera').value);
        formData.append("specifications[]", document.getElementById('processor').value);
        formData.append("specifications[]", document.getElementById('baterai').value);

        // Kirim data ke server menggunakan fetch dengan FormData
        fetch('public/add_product.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Ganti `.text()` menjadi `.json()` karena server mengembalikan JSON
            .then(data => {
                if (data.success) {
                    document.getElementById('result').innerHTML = `<p class="text-success">Produk berhasil ditambahkan dengan ID: ${data.productId}</p>`;
                    document.getElementById('productForm').reset(); // Reset form
                } else {
                    document.getElementById('result').innerHTML = `<p class="text-danger">Error: ${data.error}</p>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('result').innerHTML = '<p class="text-danger">Terjadi kesalahan saat menambahkan produk.</p>';
            });
    }

    // Event listener untuk submit form
    document.getElementById('productForm').addEventListener('submit', submitForm);
</script>

</body>

</html>