<?php
$activepage = 'shop';
include 'partial/navbar.php';
?>

<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>Shop</h1>
          <div class="search-filter mt-3 d-flex align-items-center">
            <!-- Search Bar -->
            <input
              type="text"
              id="searchInput"
              class="form-control me-2"
              placeholder="Cari produk..."
              aria-label="Search" />
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <!-- Empty column for layout or other content -->
      </div>
    </div>
  </div>
</div>

<!-- End Hero Section -->

<!-- HTML -->
<br />
<div class="container">
  <select class="form-select me-2 small-select" id="categorySelect">
    <option value="all" selected>Pilih Kategori</option>
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

<div class="untree_co-section product-section before-footer-section">
  <div class="container">
    <div class="row" id="productContainer">
      <!-- Produk akan ditambahkan di sini berdasarkan kategori -->
    </div>
  </div>
</div>
</body>


<script>
  // Retrieve the userId from the current page's URL
  const urlParams = new URLSearchParams(window.location.search);
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

  // Function to fetch and display products
  async function fetchAndDisplayProducts(category = "all", searchQuery = "") {
    try {
      const response = await fetch("public/products.php");
      const products = await response.json();

      const container = document.getElementById("productContainer");
      container.innerHTML = ""; // Clear container before adding new products

      // Filter products by category
      const filteredProducts = products.filter((product) => {
        // Check category and search query match
        const matchesCategory = category === "all" || product.category === category;
        const matchesSearch =
          searchQuery === "" ||
          product.name.toLowerCase().includes(searchQuery.toLowerCase());

        return matchesCategory && matchesSearch;
      });

      // Display filtered products
      filteredProducts.forEach(async (product) => {

        const productDiv = document.createElement("div");
        productDiv.className = "col-12 col-md-4 col-lg-3 mb-5";

        productDiv.innerHTML = `
		  <a class="product-item" href="product_detail.php?id=${product.id}&userId=${userId}">
			<img src="${product.images[0]}" class="img-fluid product-thumbnail" />
			<h3 class="product-title">${product.name}</h3>
			<strong class="product-price">${product.price.toLocaleString("en-US", {
			  style: "currency",
			  currency: "USD",
			})}</strong>
			<span class="icon-cross">Detail</span>
		  </a>
		`;
        container.appendChild(productDiv);
      });
    } catch (error) {
      console.error("Failed to fetch product data:", error);
    }
  }

  // Add event listener for search input
  document.getElementById("searchInput").addEventListener("input", (event) => {
    const searchQuery = event.target.value;
    fetchAndDisplayProducts("all", searchQuery); // Display products matching the search query
  });

  // Category selection listener (if you have a category dropdown)
  document.getElementById("categorySelect").addEventListener("change", function() {
    const selectedCategory = this.value;
    const searchQuery = document.getElementById("searchInput").value; // Get current search query
    fetchAndDisplayProducts(selectedCategory, searchQuery);
  });

  // Load all products on page load
  window.onload = () => fetchAndDisplayProducts("all");
</script>

<?php
include 'partial/footer.php';
?>

</html>