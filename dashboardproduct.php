<?php
$activepage = 'dashboardproduct';
include 'partial/dashboard/navbar.php';
?>

<div class="main-container">
	<div class="pd-ltr-20">

		<div class="card-box mb-30">
			<div class="d-flex justify-content-between align-items-center">
				<h2 class="h4 pd-20">Tabel Produk</h2>
				<!-- Tombol untuk tambah produk -->
				<a href="add_product.php" class="btn btn-primary" style="margin-right: 20px;">Tambah Produk</a>
			</div>
			<table class="data-table table nowrap">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Category</th>
						<th>Stock</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>image</th>
						<th class="datatable-nosort">Action</th>
					</tr>
				</thead>
				<tbody id="product-table-body">
					<!-- Data akan diisi secara dinamis dengan JavaScript -->
				</tbody>
			</table>
		</div>
	</div>
	<script src="vendors/scripts/core.js"></script>

	</body>

	<?php
	$activepage = 'dashboard';
	include 'partial/dashboard/footer.php';
	?>

	</html>

	<script>
		const apiEndpoint = 'public/products.php'; // Ganti dengan URL API Anda

		// Fungsi untuk mengambil data produk dari API
		async function fetchProducts() {
			try {
				const response = await fetch(apiEndpoint);
				const products = await response.json();

				if (!Array.isArray(products)) {
					console.error("Invalid data format received:", products);
					return;
				}

				populateProductTable(products);
			} catch (error) {
				console.error("Error fetching product data:", error);
			}
		}

		// Fungsi untuk mengisi tabel dengan data produk
		function populateProductTable(products) {
			const tbody = document.getElementById("product-table-body");
			tbody.innerHTML = ""; // Kosongkan tabel sebelum mengisi ulang

			products.forEach(product => {
				const row = document.createElement("tr");

				// Nama Produk
				const nameCell = document.createElement("td");
				nameCell.textContent = product.name || "No name available";
				row.appendChild(nameCell);

				// Deskripsi
				const descriptionCell = document.createElement("td");
				descriptionCell.textContent = product.description || "No description available";
				row.appendChild(descriptionCell);

				// Harga
				const priceCell = document.createElement("td");
				priceCell.textContent = `$${(product.price || 0).toFixed(2)}`;
				row.appendChild(priceCell);

				// Kategori
				const categoryCell = document.createElement("td");
				categoryCell.textContent = product.category || "No category";
				row.appendChild(categoryCell);

				// Stok
				const stockCell = document.createElement("td");
				stockCell.textContent = product.stock || 0;
				row.appendChild(stockCell);

				// Tanggal Dibuat
				const createdAtCell = document.createElement("td");
				createdAtCell.textContent = product.createdAt || "N/A";
				row.appendChild(createdAtCell);

				// Tanggal Diperbarui
				const updatedAtCell = document.createElement("td");
				updatedAtCell.textContent = product.updatedAt || "N/A";
				row.appendChild(updatedAtCell);

				// Gambar
				const imageCell = document.createElement("td");
				if (product.images && product.images.length > 0) {
					const img = document.createElement("img");
					img.src = product.images[0];
					img.alt = product.name;
					img.classList.add("product-image");
					imageCell.appendChild(img);
				} else {
					imageCell.textContent = "No image available";
				}
				row.appendChild(imageCell);

				// Aksi (Update dan Delete)
				const actionCell = document.createElement("td");

				// Wrapper tombol
				const actionWrapper = document.createElement("div");
				actionWrapper.classList.add("d-flex", "flex-column", "align-items-center");

				// Tombol Update
				const updateButton = document.createElement("button");
				updateButton.classList.add("btn", "btn-warning", "btn-sm", "mb-2");
				updateButton.style.width = "60px";
				updateButton.style.padding = "4px 8px"; // Kurangi padding
				updateButton.style.fontSize = "12px";   // Ukuran font kecil
				updateButton.textContent = "Update";
				updateButton.addEventListener("click", () => updateProduct(product.id));

				// Tombol Delete
				const deleteButton = document.createElement("button");
				deleteButton.classList.add("btn", "btn-danger", "btn-sm");
				deleteButton.style.width = "60px";
				deleteButton.style.padding = "4px 8px";
				deleteButton.style.fontSize = "12px";
				deleteButton.textContent = "Delete";
				deleteButton.addEventListener("click", () => deleteProduct(product.id));

				// Tambahkan ke wrapper
				actionWrapper.appendChild(updateButton);
				actionWrapper.appendChild(deleteButton);

				// Tambahkan wrapper ke cell
				actionCell.appendChild(actionWrapper);
				row.appendChild(actionCell);

				tbody.appendChild(row);
			});
		}

		// Fungsi Update Produk
		function updateProduct(productId) {
			console.log("Update product with ID:", productId);
			// Implementasikan logika update di sini
		}

		// Fungsi Delete Produk
		function deleteProduct(productId) {
			console.log("Delete product with ID:", productId);
			// Implementasikan logika delete di sini
		}

		// Jalankan fetchProducts saat halaman dimuat
		document.addEventListener("DOMContentLoaded", fetchProducts);
	</script>