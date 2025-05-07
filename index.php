<?php
$activepage = 'home';
include 'partial/navbar.php';
?>

<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>Where Tech <span clsas="d-block">Meets Lifestyle</span></h1>
          <p class="mb-4">
            Hadirkan teknologi yang menyatu dengan gaya hidup. Memberikan
            kemudahan, kecanggihan, dan gaya dalam satu genggaman.
          </p>
          <p>
            <a href="#product-section" class="btn btn-secondary me-2">Shop Now</a><a href="shop.php" class="btn btn-white-outline">Explore</a>
          </p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="hero-img-wrap">
          <img src="images/desk_crop.png" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section" id="product-section">
  <div class="container">
    <div class="row">
      <!-- Start Column 1 -->
      <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
        <h2 class="mb-4 section-title">Jalani harimu dengan gadget terkini.</h2>
        <p class="mb-4">
          KivRyelle menyediakan berbagai gadget terkini yang pastinya terpercaya dan terjamin kualitasnya.
        </p>
        <p><a href="shop.php" class="btn">Explore</a></p>
      </div>
      <!-- End Column 1 -->

      <!-- Kontainer Produk untuk Menambahkan Item Secara Dinamis -->
      <div id="productContainer" class="col-12 col-md-9 d-flex flex-wrap">
        <!-- Produk acak akan ditambahkan di sini melalui JavaScript -->
      </div>
    </div>
  </div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6">
        <h2 class="section-title">Why Choose Us</h2>
        <p>
          KivRyelle menjadikan pelayanan sebagai hal utama untuk mementingkan kenyamanan pelanggan.
        </p>

        <div class="row my-5">
          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="images/truck.svg" alt="Image" class="imf-fluid" />
              </div>
              <h3>Fast &amp; Free Shipping</h3>
              <p>
                Pengiriman cepat dan gratis ke seluruh penjuru dunia
              </p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="images/bag.svg" alt="Image" class="imf-fluid" />
              </div>
              <h3>Easy to Shop</h3>
              <p>
                Belanja mudah dengan webseite online. Dimanapun. Kapanpun.
              </p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img
                  src="images/support.svg"
                  alt="Image"
                  class="imf-fluid" />
              </div>
              <h3>24/7 Support</h3>
              <p>
                Melayani anda kapanpun. Setiap saat.
              </p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img
                  src="images/return.svg"
                  alt="Image"
                  class="imf-fluid" />
              </div>
              <h3>Hassle Free Returns</h3>
              <p>
                Pengembalian barang tanpa ribet. Langsung sat set.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="img-wrap">
          <img
            src="images/why-choose-us-img.jpg"
            alt="Image"
            class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-7 mb-5 mb-lg-0">
        <div class="imgs-grid">
          <div class="grid grid-1">
            <img src="images/img-grid-1.jpg" alt="Untree.co" />
          </div>
          <div class="grid grid-2">
            <img src="images/img-grid-2.jpg" alt="Untree.co" />
          </div>
          <div class="grid grid-3">
            <img src="images/img-grid-3.jpg" alt="Untree.co" />
          </div>
        </div>
      </div>
      <div class="col-lg-5 ps-lg-5">
        <h2 class="section-title mb-4">
          We help you make gadgets a lifestyle
        </h2>
        <p>
          Kami membantu Anda menjadikan gadget sebagai bagian dari gaya hidup.
          Dengan beragam produk berkualitas tinggi yang dirancang tidak hanya untuk fungsionalitas,
          tetapi juga untuk menambah nilai estetika,
          kami hadir untuk memenuhi kebutuhan gaya hidup modern Anda.
        </p>

        <ul class="list-unstyled custom-list my-4">
          <li>Gadget sebagai Gaya Hidup Modern</li>
          <li>Desain yang Estetis dan Fungsional</li>
          <li>Kenyamanan dan Kemudahan di Setiap Langkah</li>
          <li>Gadget sebagai Ekspresi Diri</li>
        </ul>
        <p><a href="shop.php" class="btn">Explore</a></p>
      </div>
    </div>
  </div>
</div>
<!-- End We Help Section -->
</body>

<script>

  // Fungsi untuk mengambil dan menampilkan produk
  async function fetchProducts() {
    try {
      const response = await fetch("public/products_limit.php");
      const products = await response.json();
      displayAllProducts(products);
    } catch (error) {
      console.error("Failed to fetch product data:", error);
    }
  }

  // Fungsi untuk menampilkan semua produk ke dalam container
  function displayAllProducts(products) {
    const container = document.getElementById("productContainer");
    if (!container) return;

    container.innerHTML = ""; // Bersihkan isi sebelumnya

    // Ambil userId dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get("userId") || "";

    products.forEach((product) => {
      const productDiv = document.createElement("div");
      productDiv.className = "col-12 col-md-4 col-lg-3 mb-5";

      productDiv.innerHTML = `
        <a class="product-item" href="product_detail.php?id=${product.id}&userId=${userId}">
          <img src="${product.images[0]}" class="img-fluid product-thumbnail" />
          <h3 class="product-title">${product.name}</h3>
          <strong class="product-price">${Number(product.price).toLocaleString("en-US", {
            style: "currency",
            currency: "USD",
          })}</strong>
          <span class="icon-cross">Detail</span>
        </a>
      `;

      container.appendChild(productDiv);
    });
  }

  // Jalankan setelah DOM siap
  document.addEventListener("DOMContentLoaded", () => {
    fetchProducts();
  });
</script>




<?php
include 'partial/footer.php';
?>

</html>