<?php
include 'partial/navbar.php';
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8" />
  <title>KivRyelle</title>

  <!-- Site favicon -->
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="vendors/images/apple-touch-icon.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="vendors/images/favicon-32x32.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="vendors/images/favicon-16x16.png" />

  <!-- Mobile Specific Metas -->
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Google Font -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
  <link
    rel="stylesheet"
    type="text/css"
    href="vendors/styles/icon-font.min.css" />
  <link
    rel="stylesheet"
    type="text/css"
    href="src/plugins/cropperjs/dist/cropper.css" />
  <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    rel="stylesheet" />
  <link href="css/tiny-slider.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <title>KivRyelle Store</title>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script
    async
    src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "UA-119386393-1");
  </script>
</head>

<body>

  <br />

  <div class="mobile-menu-overlay"></div>

  <div class="container">
    <div class="page-header">
      <div
        class="col-md-12 col-sm-12 d-flex justify-content-between align-items-center">
        <div class="row">
          <div class="title">
            <h4>Profile</h4>
          </div>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active" aria-current="page">
                Profile
              </li>
            </ol>
          </nav>
        </div>
        <div>
          <!-- tombol dashboard muncul jika yang login adalah admin -->
          <a
            href="#"
            class="btn btn-primary btn-sm"
            id="dashboardButton"
            style="display: none">
            Dashboard
          </a>

          <button id="logoutButton" class="btn btn-sm">Log Out</button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
          <div class="profile-photo">
            <a
              href="modal"
              data-toggle="modal"
              data-target="#modal"
              class="edit-avatar"><i class="fa fa-pencil"></i></a>
            <img
              src="vendors/images/photo1.jpg"
              alt=""
              class="avatar-photo" />
            <div
              class="modal fade"
              id="modal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="modalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body pd-5">
                    <div class="img-container">
                      <img
                        id="image"
                        src="vendors/images/photo2.jpg"
                        alt="Picture" />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input
                      type="submit"
                      value="Update"
                      class="btn btn-primary" />
                    <button
                      type="button"
                      class="btn btn-default"
                      data-dismiss="modal">
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h5 class="text-center h5 mb-0" id="username">Nama Customer</h5>
          <br />
          <div class="profile-info">
            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
            <ul>
              <li>
                <span>Email Address:</span>
                <span id="email">keepreal@test.com</span>
                <!-- Dynamic part here -->
              </li>
              <li>
                <span>Phone Number:</span>
                <span id="phone">619-229-0054</span>
                <!-- Dynamic part here -->
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="card-box height-100-p overflow-hidden">
          <div class="profile-tab height-100-p">
            <div class="tab height-100-p">
              <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#riwayat"
                    role="tab">Riwayat</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#pesanan"
                    role="tab">Status Pesanan</a>
                </li>
                <!-- <li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li> -->
              </ul>
              <div class="tab-content">
                <!-- riwayat Tab start -->
                <div
                  class="tab-pane fade show active"
                  id="riwayat"
                  role="tabpanel">
                  <div class="pd-20">
                    <!-- Riwayat Produk -->
                    <div class="riwayat-list mt-3">
                      <!-- The purchase history items will be appended here by JavaScript -->
                    </div>
                  </div>
                </div>

                <!-- Timeline Tab End -->

                <!-- pesanan Tab start -->
                <div class="tab-pane fade" id="pesanan" role="tabpanel">
                  <div class="pd-20 profile-task-wrap">
                    <!-- Judul Status Pesanan -->
                    <h5>Detail Pesanan</h5>

                    <!-- Daftar Produk dalam Pesanan -->
                    <div id="order-products" class="mb-4">
                      <!-- Produk akan ditampilkan di sini melalui JavaScript -->
                    </div>

                    <!-- Detail Pesanan -->
                    <div class="order-details">
                      <p>
                        <strong>Total Item:</strong>
                        <span id="total-amount"></span>
                      </p>
                      <p>
                        <strong>Status Pesanan:</strong>
                        <span id="order-status"></span>
                      </p>
                      <p>
                        <strong>Tanggal Pemesanan:</strong>
                        <span id="order-date"></span>
                      </p>
                      <p style="display: none;">
                        <strong>Tanggal Diterima:</strong>
                        <span id="delivery-date"></span>
                      </p>
                      <p>
                        <strong>Alamat Pengiriman:</strong>
                        <span id="shipping-address"></span>
                      </p>
                      <p>
                        <strong>Metode Pembayaran:</strong>
                        <span id="payment-method"></span>
                      </p>
                      <p>
                        <strong>Waktu Pembayaran:</strong>
                        <span id="payment-date"></span>
                      </p>
                      <p>
                        <strong>Jumlah Pembayaran:</strong>
                        <span id="payment-amount"></span>
                      </p>
                    </div>

                    <!-- Tombol Selesai, hanya tampil jika status adalah "delivered" -->
                    <button
                      id="complete-order-button"
                      class="btn btn-success mt-3"
                      style="display: none"
                      onclick="markOrderComplete()">
                      Selesai
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-wrap pd-20 mb-20 card-box">
      KeepReal - Basis Data Non Relasional
    </div>
  </div>

  <script src="js/auth.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", async () => {
      // Check if the user is authenticated
      const token = localStorage.getItem("authToken");

      if (!token) {
        console.log("No token found. Redirecting to login page...");
        window.location.href = "login.html";
        return;
      }

      try {
        // Validate the token with the backend
        const response = await fetch("public/validate_token.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
          },
        });

        const data = await response.json();

        if (!data.success) {
          console.log("Invalid token. Redirecting to login page...");
          localStorage.removeItem("authToken"); // Remove invalid token
          window.location.href = "login.html";
          return;
        }

        console.log("User is authenticated.");
      } catch (error) {
        console.error("Error validating token:", error);
        localStorage.removeItem("authToken");
        window.location.href = "login.html";
      }

      // Logout function for all users
      function logout() {
        localStorage.removeItem("authToken"); // Remove the token from localStorage
        console.log("User logged out. Redirecting to login page...");
        window.location.href = "login.html"; // Redirect to login
      }

      // Attach the logout functionality to the logout button
      const logoutButton = document.getElementById("logoutButton");
      if (logoutButton) {
        //alert("test");
        logoutButton.addEventListener("click", logout);
      }
    });
  </script>
  <script>
    // Fungsi untuk menambahkan userId ke semua link yang diperlukan
  function updateUserIdInLinks() {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get("userId");

    if (userId) {
      const encodedId = encodeURIComponent(userId);

      // Update semua tombol "Explore" yang menuju ke shop.php
      document.querySelectorAll('a.btn[href="shop.php"]').forEach((el) => {
        el.href = `shop.php?userId=${encodedId}`;
      });

      // Update link navigasi lainnya
      const navLinks = [
        ['a.nav-link[href="index.php"]', `index.php?userId=${encodedId}`],
        ['a.nav-link[href="shop.php"]', `shop.php?userId=${encodedId}`],
        ['a.navbar-brand[href="index.php"]', `index.php?userId=${encodedId}`],
        ['a.nav-link[href="profile.php"]', `profile.php?userId=${encodedId}`],
        ['a.nav-link[href="cart.php"]', `cart.php?userId=${encodedId}`],
      ];

      navLinks.forEach(([selector, newHref]) => {
        const link = document.querySelector(selector);
        if (link) link.href = newHref;
      });
    }
  }
  document.addEventListener("DOMContentLoaded", () => {
    updateUserIdInLinks();
  });
</script>
  <script>
    // Retrieve the userId from the current page's URL
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get("userId"); // Assuming userId is passed as a parameter
    // Function to fetch user data based on userId
    function fetchUserData(userId) {
      // Make a GET request to the PHP file
      fetch(`public/get_user.php?userId=${userId}`)
        .then((response) => response.json()) // Parse JSON response
        .then((data) => {
          if (data.error) {
            // Handle error if user is not found or another issue occurs
            console.error(data.error);
            //alert(data.error);
          } else {
            // Display or use the user data
            console.log("User Data:", data);
            // Check if the user's role is admin
            if (data.role === "admin") {
              // Show the dashboard button
              const dashboardButton = document.getElementById("dashboardButton");
              if (dashboardButton) {
                dashboardButton.style.display = "inline-block";
                dashboardButton.href = `dashboard.php?userId=${userId}`;
              }
            } else {
              console.log("User is not an admin. Hiding dashboard button.");
            }
            document.getElementById("username").innerText = data.username;
            document.getElementById("email").innerText = data.email;
            document.getElementById("phone").innerText = data.phone;
          }
        })
        .catch((error) => {
          console.error("An error occurred while fetching user data:", error);
          //alert("An error occurred. Please try again.");
        });
    }

    fetchUserData(userId);

    function fetchPurchaseHistory(userId) {
      fetch(`public/get_PurchaseHistory.php?userId=${userId}`)
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            console.error(data.error);
            //alert(data.error);
            return;
          }

          const historyContainer = document.querySelector(
            "#riwayat .riwayat-list"
          );
          historyContainer.innerHTML = ""; // Clear existing content

          data.forEach((purchase) => {
            purchase.products.forEach((product) => {
              // Create the product history card
              const card = document.createElement("div");
              card.className = "card mb-3";
              card.innerHTML = `
								<div class="card-body">
									<div class="row align-items-center">
										<!-- Foto Produk -->
										<div class="col-md-2">
											<img src="${product.images[0]}" alt="Foto Produk" class="img-fluid">
										</div>
		
										<!-- Detail Produk -->
										<div class="col-md-10">
											<h6>Nama Product: ${product.name}</h6>
											<div class="row">
												<div class="col-md-4">
													<p><strong>Qty:</strong> ${product.quantity}</p>
													<p><strong>Harga:</strong> $${product.price.toFixed(2)}</p>
												</div>
												<div class="col-md-4">
													<p><strong>Tanggal Pemesanan:</strong><br> ${purchase.orderDate}</p>
													<p><strong>Tanggal Diterima:</strong><br> ${
                            purchase.deliveryDate || "Not Available"
                          }</p>
												</div>
												<div class="col-md-4">
													<p><strong>Alamat:</strong> ${purchase.shippingAddress.street}, ${
                  purchase.shippingAddress.city
                }, ${purchase.shippingAddress.state}</p>
													<p><strong>Pembayaran:</strong> ${purchase.payment.method}</p>
													<p><strong>Waktu Pembayaran:</strong><br> ${purchase.payment.paymentDate}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							`;
              // Append the card to the history container
              historyContainer.appendChild(card);
            });
          });
        })
        .catch((error) => {
          console.error(
            "An error occurred while fetching purchase history:",
            error
          );
          //alert("An error occurred. Please try again.");
        });
    }

    // Call the function with a specific userId
    fetchPurchaseHistory(userId); // Replace "yourUserIdHere" with the actual user ID

    function fetchTransactionDetails(userId) {
      fetch(`public/get_Transactions.php?userId=${userId}`)
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            console.error(data.error);
            //alert(data.error);
            return;
          }

          // Assume we are displaying the first transaction in the list for this example
          const order = data[0];
          displayOrderDetails(order);
        })
        .catch((error) =>
          console.error("Error fetching transaction data:", error)
        );
    }
    let jumlai_item = 0;
    // Display transaction details in HTML
    function displayOrderDetails(order) {
      // Display products in order
      const orderProductsContainer =
        document.getElementById("order-products");
      orderProductsContainer.innerHTML = "";
      order.products.forEach((product) => {
        orderProductsContainer.innerHTML += `
					<div class="card mb-2">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-md-2">
									<img src="${product.images[0]}" alt="${product.name}" class="img-fluid">
								</div>
								<div class="col-md-10">
									<h6>${product.name || "Product Name"}</h6>
									<p><strong>Qty:</strong> ${product.quantity}</p>
									<p><strong>Price:</strong> $${product.price.toFixed(2)}</p>
								</div>
							</div>
						</div>
					</div>
				`;
        jumlai_item += product.quantity;
      });

      // Display other order details
      document.getElementById(
        "total-amount"
      ).textContent = `${jumlai_item}`;
      document.getElementById("order-status").textContent = formatOrderStatus(
        order.orderStatus
      );
      document.getElementById("order-date").textContent = formatDate(
        order.orderDate
      );
      document.getElementById("delivery-date").textContent = formatDate(
        order.deliveryDate
      );
      document.getElementById(
        "shipping-address"
      ).textContent = `${order.shippingAddress.street}, ${order.shippingAddress.city}, ${order.shippingAddress.state}, ${order.shippingAddress.postalCode}`;
      document.getElementById("payment-method").textContent =
        order.payment.paymentMethod;
      document.getElementById("payment-date").textContent = formatDate(
        order.payment.paymentDate
      );
      document.getElementById("payment-amount").textContent = `$${parseFloat(
          order.payment.amount
        ).toFixed(2)}`;

      // Set the onclick function with the correct order ID
      document.getElementById("complete-order-button").onclick = function() {
        markOrderComplete(order._id);
      };

      // Show "Complete Order" button if status is "delivered"
      if (order.orderStatus === "delivered") {
        document.getElementById("complete-order-button").style.display =
          "block";
      }
    }

    // Helper function to format order status
    function formatOrderStatus(status) {
      return status.charAt(0).toUpperCase() + status.slice(1);
    }

    // Helper function to format dates
    function formatDate(dateString) {
      const options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
      };
      return new Date(dateString).toLocaleDateString("id-ID", options);
    }

    // Function to mark order as complete
    function markOrderComplete(orderId) {
      //alert("Pesanan selesai. Terima kasih!");
      fetch("public/update_order_status.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            orderId: orderId,
            newStatus: "success"
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            //alert("Pesanan selesai dan dipindahkan ke riwayat.");
            document.getElementById("order-status").textContent = "completed";
            document.getElementById("complete-order-button").style.display =
              "none"; // Hide the button
            location.reload();
          } else {
            //alert("Failed to complete order: " + (data.error || "Unknown error"));
          }
        })
        .catch((error) => console.error("Error completing order:", error));
    }

    // Initialize with a specific user ID
    fetchTransactionDetails(userId); // Replace with the actual user ID
  </script>
  <!-- js -->
  <script src="vendors/scripts/core.js"></script>
  <script src="vendors/scripts/script.min.js"></script>
  <script src="vendors/scripts/process.js"></script>
  <script src="vendors/scripts/layout-settings.js"></script>
  <script src="src/plugins/cropperjs/dist/cropper.js"></script>
  <script>
    window.addEventListener("DOMContentLoaded", function() {
      var image = document.getElementById("image");
      var cropBoxData;
      var canvasData;
      var cropper;

      $("#modal")
        .on("shown.bs.modal", function() {
          cropper = new Cropper(image, {
            autoCropArea: 0.5,
            dragMode: "move",
            aspectRatio: 3 / 3,
            restore: false,
            guides: false,
            center: false,
            highlight: false,
            cropBoxMovable: false,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
            ready: function() {
              cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
            },
          });
        })
        .on("hidden.bs.modal", function() {
          cropBoxData = cropper.getCropBoxData();
          canvasData = cropper.getCanvasData();
          cropper.destroy();
        });
    });
  </script>
</body>

</html>