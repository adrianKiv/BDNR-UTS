        <div class="footer-wrap pd-20 mb-20 card-box">
            KeepReal - Basis Data Non Relasional
        </div>
    </div>
</div>
<!-- js -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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

            // Extract userId from the response or URL
            const urlParams = new URLSearchParams(window.location.search);
            const userId = urlParams.get("userId") || data.user.userId;

            // Fetch user data and update UI
            if (userId) {
                fetchUserData(userId);

                // Update links with userId
                updateLinksWithUserId(userId);
            }
        } catch (error) {
            console.error("Error validating token:", error);
            localStorage.removeItem("authToken");
            window.location.href = "login.html";
        }

        // Attach logout functionality
        const logoutButton = document.getElementById("logoutButton");
        if (logoutButton) {
            logoutButton.addEventListener("click", () => {
                localStorage.removeItem("authToken");
                console.log("User logged out. Redirecting to login page...");
                window.location.href = "login.html";
            });
        }
    });

    function updateLinksWithUserId(userId) {
        // Update Product link
        const dashboardLink = document.querySelector('a[href="dashboard.php"]');
        if (dashboardLink) {
            dashboardLink.href = `dashboard.php?userId=${userId}`;
        }

        const productLink = document.querySelector('a[href="dashboardproduct.php"]');
        if (productLink) {
            productLink.href = `dashboardproduct.php?userId=${userId}`;
        }
        
        const addproductLink = document.querySelector('a[href="add_product.php"]');
        if (addproductLink) {
            addproductLink.href = `add_product.php?userId=${userId}`;
        }

        // Update Pesanan link
        const pesananLink = document.querySelector('a[href="dashboardpesanan.php"]');
        if (pesananLink) {
            pesananLink.href = `dashboardpesanan.php?userId=${userId}`;
        }

        // Add userId to profile link
        const profileLink = document.getElementById("profileLink");
        if (profileLink) {
            profileLink.href = `profile.php?userId=${userId}`;
        }
    }

    function fetchUserData(userId) {
        // Make a GET request to the PHP file
        fetch(`public/get_user.php?userId=${userId}`)
            .then((response) => response.json()) // Parse JSON response
            .then((data) => {
                if (data.error) {
                    console.error(data.error);
                } else {
                    // Update user name
                    const userNameElement = document.getElementById("userName");
                    if (userNameElement) {
                        userNameElement.textContent = data.username || "User";
                    }
                }
            })
            .catch((error) => {
                console.error("An error occurred while fetching user data:", error);
            });
    }
</script>