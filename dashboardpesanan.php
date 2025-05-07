<?php
$activepage = 'dashboardpesanan';
include 'partial/dashboard/navbar.php';
?>

<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box mb-30">
			<h2 class="h4 pd-20">Riwayat Seluruh Pesanan</h2>
			<table class="data table nowrap">
				<thead>
					<tr>
						<th>User</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total Amount</th>
						<th>Order Status</th>
						<th>Order Date</th>
						<th>Shipping Address</th>
						<th>Payment Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="purchase-history-body">
					<!-- Data will be populated dynamically with JavaScript -->
				</tbody>
			</table>
		</div>

		<!-- User Details Modal -->
		<div class="modal" id="userModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">User Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="user-details">
						<!-- User details will be displayed here -->
					</div>
				</div>
			</div>
		</div>

		<!-- Product Details Modal -->
		<div class="modal" id="productModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Product Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="product-details">
						<!-- Product details will be displayed here -->
					</div>
				</div>
			</div>
		</div>

		<!-- Shipping Address Modal -->
		<div class="modal" id="shippingModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Shipping Address</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="shipping-address">
						<!-- Shipping address will be displayed here -->
					</div>
				</div>
			</div>
		</div>
		<script src="vendors/scripts/core.js"></script>

		</body>
		<?php
		$activepage = 'dashboardpesanan';
		include 'partial/dashboard/footer.php';
		?>

		</html>

		<script>
			let purchaseHistory = [];

			async function fetchAllPurchaseHistory() {
				try {
					const response = await fetch("public/get_all_transactions.php");
					const data = await response.json();

					if (data.error) {
						console.error("Error fetching purchase history:", data.error);
						alert(data.error);
						return;
					}

					purchaseHistory = data; // Assign to global variable
					populatePurchaseTable(purchaseHistory); // Populate table
				} catch (error) {
					console.error("Error fetching purchase history:", error);
					alert("An error occurred while fetching purchase history.");
				}
			}




			async function populatePurchaseTable(purchaseHistory) {
				const tableBody = document.getElementById("purchase-history-body");
				tableBody.innerHTML = ""; // Clear existing rows

				for (const [index, purchase] of purchaseHistory.entries()) {

					const row = document.createElement("tr");

					// User column
					const userCell = document.createElement("td");
					userCell.innerHTML = `<a href="#" onclick="showUserDetails(${index})">${purchase.user.username}</a>`;
					row.appendChild(userCell);

					// Product column
					const productCell = document.createElement("td");
					productCell.innerHTML = `<a href="#" onclick="showProductDetails(${index})">${purchase.products[0].name}</a>`;
					row.appendChild(productCell);

					// Quantity column
					const quantityCell = document.createElement("td");
					quantityCell.textContent = purchase.products[0].quantity;
					row.appendChild(quantityCell);

					// Price column
					const priceCell = document.createElement("td");
					priceCell.textContent = `$${purchase.products[0].price}`;
					row.appendChild(priceCell);

					// Total Amount column
					const totalCell = document.createElement("td");
					totalCell.textContent = `$${purchase.totalAmount}`;
					row.appendChild(totalCell);

					// Order Status column
					const statusCell = document.createElement("td");
					statusCell.textContent = purchase.orderStatus;
					row.appendChild(statusCell);

					// Order Date column
					const orderDateCell = document.createElement("td");
					orderDateCell.textContent = purchase.orderDate;
					row.appendChild(orderDateCell);

					// Shipping Address column
					const addressCell = document.createElement("td");
					addressCell.innerHTML = `<a href="#" onclick="showShippingAddress(${index})">View Address</a>`;
					row.appendChild(addressCell);

					// Payment Status column
					const paymentStatusCell = document.createElement("td");
					paymentStatusCell.textContent = purchase.payment.paymentStatus;
					row.appendChild(paymentStatusCell);

					// Kolom tombol aksi
					const actionCell = document.createElement("td");
					actionCell.classList.add("order-action");

					if (purchase.payment.paymentStatus === "delivered") {
						// Jika status adalah "delivered", tampilkan teks "Menunggu Konfirmasi"
						actionCell.innerHTML = `<span class="text-success">Menunggu Konfirmasi</span>`;
					} else {
						// Tambahkan tombol Update Status
						const updateButton = document.createElement("button");
						updateButton.classList.add("btn", "btn-primary", "btn-sm");
						updateButton.textContent = "Update Status";
						updateButton.addEventListener("click", () => updateOrderStatus(index));
						actionCell.appendChild(updateButton);
					}
					row.appendChild(actionCell);

					tableBody.appendChild(row);
				}
			}





			function updateOrderStatus(index) {
				const statusOrder = ["shipping", "delivered"];
				const currentIndex = statusOrder.indexOf(purchaseHistory[index].orderStatus);

				if (currentIndex < statusOrder.length - 1) {
					const newStatus = statusOrder[currentIndex + 1];

					// Update ke API menggunakan _id
					fetch("public/update_order_status_admin.php", {
							method: "POST",
							headers: {
								"Content-Type": "application/json"
							},
							body: JSON.stringify({
								id: purchaseHistory[index]._id, // Kirim _id dari MongoDB
								newStatus: newStatus,
							}),
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								// alert(`Order status updated to ${newStatus}`);
								purchaseHistory[index].orderStatus = newStatus;


								location.reload();
							} else {
								//alert(data.message);
							}
						})
						.catch(error => {
							console.error("Error updating status:", error);
							//alert("Failed to update order status.");
						});
				} else {
					//alert("Order is already delivered.");
				}
			}



			document.addEventListener("DOMContentLoaded", fetchAllPurchaseHistory);


			function showUserDetails(index) {
				const user = purchaseHistory[index].user;
				const userDetails = document.getElementById("user-details");
				if (!user) return;
				userDetails.innerHTML = `
		  <p>Username: ${user.username || "N/A"}</p>
		  <p>Email: ${user.email || "N/A"}</p>
		  <p>Phone: ${user.phone || "N/A"}</p>
		  <p>Role: ${user.role || "N/A"}</p>
		`;
				$('#userModal').modal('show');
			}

			function showProductDetails(index) {
				const product = purchaseHistory[index]?.products?.[0];
				if (!product) return;
				const productDetails = document.getElementById("product-details");
				productDetails.innerHTML = `
		  <p>Product Name: ${product.name || "N/A"}</p>
		  <p>Quantity: ${product.quantity || "N/A"}</p>
		  <p>Price: $${product.price || "0.00"}</p>
		`;
				$('#productModal').modal('show');
			}

			function showShippingAddress(index) {
				const address = purchaseHistory[index]?.shippingAddress;
				if (!address) return;

				const shippingDetails = document.getElementById("shipping-address");
				shippingDetails.innerHTML = `
		  <p>Street: ${address.street || "N/A"}</p>
		  <p>City: ${address.city || "N/A"}</p>
		  <p>State: ${address.state || "N/A"}</p>
		  <p>Postal Code: ${address.postalCode || "N/A"}</p>
		`;
				$('#shippingModal').modal('show'); // Trigger modal display
			}
		</script>