<?php
$activepage = 'dashboard';
include 'partial/dashboard/navbar.php';
?>

<!-- Isi -->
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<div class="col-md-4">
					<img src="vendors/images/banner-img.png" alt="">
				</div>
				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
						Welcome back <div class="weight-600 font-30 text-blue">Admin!</div>
					</h4>
					<p class="font-18 max-width-600">Semangat Bang.</p>
				</div>
			</div>
		</div>
		<!-- <div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">2020</div>
								<div class="weight-600 font-14">Contact</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">400</div>
								<div class="weight-600 font-14">Deals</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">350</div>
								<div class="weight-600 font-14">Campaign</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		<!-- <div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div> -->
		<div class="card-box mb-30">
			<h2 class="h4 pd-20">Riwayat Seluruh Pembelian</h2>
			<table class="data table nowrap">
				<thead>
					<tr>
						<th>User</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Order Status</th>
						<th>Order Date</th>
						<th>Shipping Address</th>
					</tr>
				</thead>
				<tbody id="purchase-history-body">
					<!-- Data akan diisi secara dinamis dengan JavaScript -->
				</tbody>
			</table>
		</div>

		<!-- Modal for User Details -->
		<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">User Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="user-details">
						<!-- User details will be populated here -->
					</div>
				</div>
			</div>
		</div>

		<!-- Modal for Product Details -->
		<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Product Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="product-details">
						<!-- Product details will be populated here -->
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="shippingModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Shipping Address</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" id="shipping-address">
						<!-- Shipping details will be populated here -->
					</div>
				</div>
			</div>
		</div>



		<!-- js -->
		</body>
		<script src="vendors/scripts/core.js"></script>

		<?php
		$activepage = 'home';
		include 'partial/dashboard/footer.php';
		?>

		</html>




		<script>
			let purchaseHistory = []; // Declare globally


			async function fetchAllPurchaseHistory() {
				try {
					const response = await fetch("public/get_all_purchase_history.php");
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

					// User Column
					const user = purchase.user;
					const userCell = document.createElement("td");
					userCell.innerHTML = `<a href="#" onclick="showUserDetails(${index})">${user.username || "Unknown User"}</a>`;
					row.appendChild(userCell);

					// Product Column
					const firstProduct = purchase.products?.[0] || {}; // Use optional chaining and default to empty object
					const productCell = document.createElement("td");
					productCell.innerHTML = `<a href="#" onclick="showProductDetails(${index})">${firstProduct.name || "Unknown Product"}</a>`;
					row.appendChild(productCell);

					// Quantity Column
					const quantityCell = document.createElement("td");
					quantityCell.textContent = firstProduct.quantity || "N/A";
					row.appendChild(quantityCell);

					// Price Column
					const priceCell = document.createElement("td");
					priceCell.textContent = `$${firstProduct.price || "0.00"}`;
					row.appendChild(priceCell);

					// Order Status Column
					const statusCell = document.createElement("td");
					statusCell.textContent = purchase.orderStatus || "N/A";
					row.appendChild(statusCell);

					// Order Date Column
					const dateCell = document.createElement("td");
					dateCell.textContent = purchase.orderDate || "N/A";
					row.appendChild(dateCell);

					const addressCell = document.createElement("td");
					addressCell.innerHTML = `<a href="#" onclick="showShippingAddress(${index})">View Address</a>`;
					row.appendChild(addressCell);

					tableBody.appendChild(row);
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