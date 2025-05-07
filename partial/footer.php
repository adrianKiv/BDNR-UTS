<!-- Start Footer Section -->
<footer class="footer-section">
    <div class="container relative">
        <div class="sofa-img">
            <img src="images/setpc.png" alt="Image" class="img-fluid" />
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="subscription-form">
                    <h3 class="d-flex align-items-center">
                        <span class="me-1"><img
                                src="images/envelope-outline.svg"
                                alt="Image"
                                class="img-fluid" /></span><span>Subscribe to Danpis</span>
                    </h3>

                    <form action="#" class="row g-3">
                        <div class="col-auto">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Enter your name" />
                        </div>
                        <div class="col-auto">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email" />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap">
                    <a href="#" class="footer-logo">Keep Real<span>.</span></a>
                </div>
                <p class="mb-4">
                    Us on Media Social :
                </p>

                <ul class="list-unstyled custom-social">
                    <li>
                        <a href="#"><span class="fa fa-brands fa-facebook-f"></span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-brands fa-twitter"></span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-brands fa-instagram"></span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-brands fa-linkedin"></span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        . All Rights Reserved. &mdash; Designed with Expert by kelompok 12
                        <!-- License information: https://untree.co/license/ -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Section -->
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
        ['a.navbar-brand[href="index.php"]', `index.php?userId=${encodedId}`],
        ['a.nav-link[href="shop.php"]', `shop.php?userId=${encodedId}`],
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


    });
</script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>