<?php
include 'partial/navbar.php';
?>

<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Cart</h1>
				</div>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section before-footer-section">
	<div class="container">
		<div class="row mb-5">
			<form class="col-md-12" method="post">
				<div class="site-blocks-table">
					<table class="table">
						<thead>
							<tr>
								<th class="product-thumbnail">Image</th>
								<th class="product-name">Product</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-total">Total</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody id="cart-items">
							<!-- Cart items will be injected here by JavaScript -->
						</tbody>
					</table>
				</div>
			</form>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="row mb-5">
					<div class="col-md-6 mb-3 mb-md-0">
						<button class="btn btn-black btn-sm btn-block" onclick="loadCart()">Update Cart</button>
					</div>
					<div class="col-md-6">
						<button class="btn btn-outline-black btn-sm btn-block" id="continueShoppingButton">Continue Shopping</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 pl-5">
				<div class="row justify-content-end">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12 text-right border-bottom mb-5">
								<h3 class="text-black h4 text-uppercase">Cart Totals</h3>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<span class="text-black">Subtotal</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black subtotal-amount">$0.00</strong>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-md-6">
								<span class="text-black">Total</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black total-amount">$0.00</strong>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<button id="checkoutButton" class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>


<script>
	const urlParams = new URLSearchParams(window.location.search);
	const userId = urlParams.get('userId'); // Assuming userId is passed as a parameter

	// Set up the "Continue Shopping" button
	document.getElementById('continueShoppingButton').onclick = function() {
		window.location.href = `shop.php?userId=${userId}`;
	};

	document.getElementById('checkoutButton').onclick = function() {
		window.location.href = `checkout.php?userId=${userId}`;
	};
	// If userId exists, append it to the relevant links
	if (userId) {
		// Update the Home link
		document.querySelector('a.nav-link[href="index.php"]').href = `index.php?userId=${userId}`;

		// Update the Shop link
		document.querySelector('a.nav-link[href="shop.php"]').href = `shop.php?userId=${userId}`;

		// Update the Profile link
		document.querySelector('a.nav-link[href="profile.php"]').href = `profile.php?userId=${userId}`;

		// Update the Cart link
		document.querySelector('a.nav-link[href="cart.php"]').href = `cart.php?userId=${userId}`;
	}


	// Function to fetch cart data
	function loadCart() {
		fetch(`public/get_cart.php?userId=${userId}`)
			.then(response => response.json())
			.then(cartData => {
				if (cartData.error) {
					alert(cartData.error);
					return;
				}

				const products = cartData.products;
				const cartItemsContainer = document.getElementById('cart-items');
				cartItemsContainer.innerHTML = ''; // Clear existing items

				let subtotal = 0;

				if (products.length === 0) {
					// If cart is empty, disable or hide the checkout button
					document.getElementById('checkoutButton').style.display = 'none';
					cartItemsContainer.innerHTML = `<tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>`;
					document.querySelector('.subtotal-amount').innerText = `$0.00`;
					document.querySelector('.total-amount').innerText = `$0.00`;
					return;
				}

				// If cart has items, show the checkout button
				document.getElementById('checkoutButton').style.display = 'block';

				products.forEach(product => {
					fetch(`public/get_product.php?productId=${product.productId}`)
						.then(response => response.json())
						.then(productData => {
							const price = productData.price;
							const total = price * product.quantity;
							subtotal += total;

							const row = document.createElement('tr');
							row.innerHTML = `
										<td class="product-thumbnail">
											<img src="${productData.images[0]}" alt="${productData.name}" class="img-fluid">
										</td>
										<td class="product-name">
											<h2 class="h5 text-black">${productData.name}</h2>
										</td>
										<td>$${productData.price}</td>
										<td>
											<div class="input-group mb-3 d-flex align-items-center quantity-container">
												<div class="input-group-prepend">
													<button class="btn btn-outline-black decrease" type="button" onclick="updateQuantity('${product.productId}', ${product.quantity - 1})">&minus;</button>
												</div>
												<input type="text" class="form-control text-center quantity-amount" value="${product.quantity}" readonly>
												<div class="input-group-append">
													<button class="btn btn-outline-black increase" type="button" onclick="updateQuantity('${product.productId}', ${product.quantity + 1})">&plus;</button>
												</div>
											</div>
										</td>
										<td>$${total.toFixed(2)}</td>
										<td><a href="javascript:void(0);" class="btn btn-black btn-sm" onclick="removeProduct('${product.productId}')">X</a></td>
									`;
							cartItemsContainer.appendChild(row);

							document.querySelector('.subtotal-amount').innerText = `$${subtotal.toFixed(2)}`;
							document.querySelector('.total-amount').innerText = `$${subtotal.toFixed(2)}`;
						});
				});
			})
			.catch(error => console.error('Error loading cart:', error));
	}



	// Call loadCart() on page load
	window.onload = loadCart;

	// Function to update quantity
	function updateQuantity(productId, newQuantity) {
		if (newQuantity < 1) return; // Minimum quantity is 1

		fetch('public/update_cart.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					userId,
					productId,
					quantity: newQuantity
				})
			})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
					loadCart(); // Reload the cart to reflect changes
				} else {
					alert("Failed to update quantity.");
				}
			})
			.catch(error => console.error('Error updating quantity:', error));
	}

	// Function to remove product from cart
	function removeProduct(productId) {
		fetch('public/remove_from_cart.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					userId,
					productId
				})
			})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
					loadCart(); // Reload the cart to reflect changes
				} else {
					alert("Failed to remove product.");
				}
			})
			.catch(error => console.error('Error removing product:', error));
	}
</script>
<?php
include 'partial/footer.php';
?>

</html>