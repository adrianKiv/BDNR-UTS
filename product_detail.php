<?php
$activepage = 'shop';
include 'partial/navbar.php';
?>
<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1 id="product-name"></h1>
					<h2 style="color: white;" id="product-price"></h2>
					<p class="mb-4" id="product-description"></p>
					<p>
						<a href="javascript:void(0);" class="btn btn-secondary me-2" onclick="addToCart()" id="add-to-cart">
							Tambah ke keranjang
						</a>
					</p>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="hero-img-wrap text-center">
					<img id="product-image" class="img-fluid" alt="Product Image">
				</div>
			</div>
		</div>
	</div>
</div>

<!-- End Hero Section -->



<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-6">
				<h2 class="section-title">Spesifikasi</h2>
				<!-- <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p> -->

				<div id="specifications-container" class="row">

				</div>
			</div>

			<div class="col-lg-5">
				<div class="img-wrap">
					<img id="product-image2" alt="Image" class="img-fluid">
				</div>
			</div>

		</div>
	</div>
</div>

<!-- Start Comment Section -->
<div class="testimonial-section before-footer-section">
	<div class="container">
		<!-- <div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Komentar</h2>
					</div>
				</div> -->

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="testimonial-slider-wrap text-center">

					<div id="testimonial-nav">
						<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
						<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
					</div>

					<div class="testimonial-slider">

						<!-- Komentar Item 1 -->
						<div id="ratings-container">
							<h2>Comments and Ratings</h2>
							<!-- Ratings will be loaded here by JavaScript -->
						</div>
						<!-- END item -->



					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Comment Section -->
</body>

<script>
	// Retrieve the product ID from the URL
	const urlParams = new URLSearchParams(window.location.search);
	const productId = urlParams.get('id');
	const userId = urlParams.get('userId'); // Assuming userId is passed as a parameter

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


	// AJAX request to fetch product details and ratings
	fetch(`public/get_product_detail.php?id=${productId}`)
		.then(response => response.json())
		.then(data => {
			console.log(data);
			if (data.error) {
				document.getElementById('ratings-container').innerHTML = `<p>${data.error}</p>`;
				return;
			}
			// Access productId and userId from the data response

			// Display product details
			document.getElementById('product-name').innerText = data.name;
			document.getElementById('product-price').innerText = new Intl.NumberFormat('en-US', {
				style: 'currency',
				currency: 'USD'
			}).format(data.price);

			document.getElementById('product-image2').src = data.images[0];
			document.getElementById('product-image').src = data.images[1];
			document.getElementById('product-description').innerText = data.description;

			// Menampilkan spesifikasi produk
			const specificationsContainer = document.getElementById('specifications-container');
			data.specifications.forEach(spec => {
				// Membuat elemen HTML untuk spesifikasi
				const specElement = document.createElement('div');
				specElement.classList.add('col-6', 'col-md-6');

				specElement.innerHTML = `
									<div class="feature">
										<div class="icon">
											<img src="images/support.svg" alt="Image" class="img-fluid">
										</div>
										<p>${spec}.</p>
									</div>
								`;

				// Menambahkan elemen spesifikasi ke dalam kontainer
				specificationsContainer.appendChild(specElement);
			});


			// Display ratings
			const ratingsContainer = document.getElementById('ratings-container');
			data.ratings.forEach(rating => {
				const item = document.createElement('div');
				item.className = 'item';

				item.innerHTML = `
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">
									<div class="testimonial-block text-center">
										<span class="comment-date">${rating.reviewDate}</span>
										<h3 class="font-weight-bold mt-2">${rating.name}</h3>
										<div class="rating mb-3">
											${generateStars(rating.rating)}
										</div>
										<blockquote class="mb-5">
											<p>&ldquo;${rating.comment}&rdquo;</p>
										</blockquote>
									</div>
								</div>
							</div>
						`;
				ratingsContainer.appendChild(item);
			});
		})
		.catch(error => {
			console.log('hahahhahah');
			document.getElementById('ratings-container').innerHTML = `<p>no comments.</p>`;
			console.error('Error:', error);
		});

	function addToCart() {
		fetch('public/add_to_cart.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					userId: userId, // userId from the response
					productId: productId, // productId from the response
					quantity: 1
				})
			})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
					alert("Product added to cart successfully!");
				} else {
					alert("Error adding product to cart.");
				}
			})
			.catch(error => console.error('Error:', error));
	}

	// Function to generate star rating HTML
	function generateStars(rating) {
		let starsHTML = '';
		for (let i = 0; i < 5; i++) {
			starsHTML += i < rating ? '<span class="fa fa-star checked"></span>' : '<span class="fa fa-star"></span>';
		}
		return starsHTML;
	}
</script>

<style>
	.fa-star {
		color: #FFD700;
		/* Gold color */
	}

	.checked {
		color: #FFD700;
	}
</style>

<?php
	include 'partial/footer.php';
?>

</html>