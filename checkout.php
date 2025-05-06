<?php
include 'partial/navbar.php';
?>

    <!-- Start Hero Section -->
    <div class="hero">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5">
            <div class="intro-excerpt">
              <h1>Checkout</h1>
            </div>
          </div>
          <div class="col-lg-7"></div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section">
      <div class="container">
        <div class="row mb-5">
          <!-- <div class="col-md-12">
		          <div class="border p-4 rounded" role="alert">
		            Returning customer? <a href="#">Click here</a> to login
		          </div>
		        </div> -->
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Shipping Address</h2>
            <div class="p-3 p-lg-5 border bg-white">
              <div class="form-group">
                <label for="c_country" class="text-black"
                  >Street <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="Street"
                  name="Street" />
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black"
                    >city <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="city"
                    name="city" />
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black"
                    >state <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="state"
                    name="state" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black"
                    >postal code <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="postalCode"
                    name="postalCode" />
                </div>
              </div>
              <br /><br />

              <!-- Box untuk menampilkan shippingAddress -->
              <div class="form-group row mb-5">
                <div class="col-md-12">
                  <div
                    class="card p-3"
                    style="border: 1px solid #ddd; border-radius: 5px">
                    <h5 class="text-black">Billing Details</h5>
                    <p>
                      <strong>username:</strong>
                      <span id="shipping_street"></span>
                    </p>
                    <p>
                      <strong>total amount:</strong>
                      <span id="shipping_city">2</span>
                    </p>
                    <p>
                      <strong>order Status:</strong>
                      <span id="shipping_state">proses</span>
                    </p>
                    <p>
                      <strong>order Date:</strong>
                      <span id="shipping_postalCode">12345</span>
                    </p>
                    <p>
                      <strong>delivery Date:</strong>
                      <span id="shipping_delivery">12345</span>
                    </p>
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
		              <label for="c_create_account" class="text-black" data-bs-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
		              <div class="collapse" id="create_an_account">
		                <div class="py-2 mb-4">
		                  <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
		                  <div class="form-group">
		                    <label for="c_account_password" class="text-black">Account Password</label>
		                    <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
		                  </div>
		                </div>
		              </div>
		            </div> -->

              <!-- <div class="form-group">
		              <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Ship To A Different Address?</label>
		              <div class="collapse" id="ship_different_address">
		                <div class="py-2">

		                  <div class="form-group">
		                    <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
		                    <select id="c_diff_country" class="form-control">
		                      <option value="1">Select a country</option>    
		                      <option value="2">bangladesh</option>    
		                      <option value="3">Algeria</option>    
		                      <option value="4">Afghanistan</option>    
		                      <option value="5">Ghana</option>    
		                      <option value="6">Albania</option>    
		                      <option value="7">Bahrain</option>    
		                      <option value="8">Colombia</option>    
		                      <option value="9">Dominican Republic</option>    
		                    </select>
		                  </div>


		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
		                    </div>
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-12">
		                      <label for="c_diff_companyname" class="text-black">Company Name </label>
		                      <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
		                    </div>
		                  </div>

		                  <div class="form-group row  mb-3">
		                    <div class="col-md-12">
		                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
		                  </div>

		                  <div class="form-group row">
		                    <div class="col-md-6">
		                      <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
		                    </div>
		                  </div>

		                  <div class="form-group row mb-5">
		                    <div class="col-md-6">
		                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
		                    </div>
		                  </div>

		                </div>

		              </div>
		            </div>

		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Order Notes</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
		            </div> -->
            </div>
          </div>
          <div class="col-md-6">
            <!-- <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Coupon Code</h2>
		              <div class="p-3 p-lg-5 border bg-white">

		                <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
		                <div class="input-group w-75 couponcode-wrap">
		                  <input type="text" class="form-control me-2" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
		                  <div class="input-group-append">
		                    <button class="btn btn-black btn-sm" type="button" id="button-addon2">Apply</button>
		                  </div>
		                </div>

		              </div>
		            </div>
		          </div> -->

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border bg-white">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody id="product-table-body">
                      <!-- Rows akan ditambahkan secara dinamis menggunakan JavaScript -->
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6" class="text-black font-weight-bold">
                          <strong>Order Total</strong>
                        </td>
                        <td id="cart-subtotal" class="text-black">$0.00</td>
                      </tr>
                      <!-- <tr>
								<td colspan="6" class="text-black font-weight-bold"><strong>Order Total</strong></td>
								<td id="order-total" class="text-black font-weight-bold">$0.00</td>
							  </tr> -->
                    </tfoot>
                  </table>

                  <h2>Payment</h2>
                  <div class="form-group border p-3">
                    <div class="mb-3">
                      <label for="amount" class="text-black"
                        >Amount <span class="text-danger">*</span></label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="amount"
                        name="amount"
                        placeholder="2"
                        readonly />
                    </div>
                    <div class="mb-3">
                      <label for="paymentMethod" class="text-black"
                        >Payment Method
                        <span class="text-danger">*</span></label
                      >
                      <select id="paymentMethod" class="form-control">
                        <option value="1">Select a Method</option>
                        <option value="2">PayPal</option>
                        <option value="3">Bank Transfer</option>
                      </select>
                    </div>
                    <div class="form-group row mb-3">
                      <div class="col-md-6">
                        <label for="paymentDate" class="text-black"
                          >Payment Date
                          <span class="text-danger">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="paymentDate"
                          name="paymentDate"
                          placeholder="now"
                          readonly />
                      </div>
                      <div class="col-md-6">
                        <label for="paymentStatus" class="text-black"
                          >Payment Status
                          <span class="text-danger">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="paymentStatus"
                          name="paymentStatus"
                          placeholder="ongoing"
                          readonly />
                      </div>
                    </div>
                    <!-- <div class="mb-3">
                      <label for="historyDate" class="text-black"
                        >History Date <span class="text-danger">*</span></label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="historyDate"
                        name="historyDate"
                        placeholder="apeni"
                        readonly />
                    </div> -->
                  </div>

                  <br />
                  <div class="form-group">
                    <button
                      id="placeOrderButton"
                      class="btn btn-black btn-lg py-3 btn-block">
                      Place Order
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
    </body>
    <script>
      const urlParams = new URLSearchParams(window.location.search);
      const userId = urlParams.get("userId"); // Get userId if it's available in the URL
      let cek_address = 0;
      let cek_payment = 0;
      // Function to add userId as a query parameter to each link
      function addUserIdToLinks() {
        if (!userId) return; // Exit if userId is not available

        // List of links to update
        const linksToUpdate = [
          { selector: 'a.nav-link[href="index.php"]', href: "index.php" },
          { selector: 'a.nav-link[href="shop.php"]', href: "shop.php" },
          { selector: 'a.nav-link[href="about.php"]', href: "about.php" },
          {
            selector: 'a.nav-link[href="services.php"]',
            href: "services.php",
          },
          { selector: 'a.nav-link[href="blog.php"]', href: "blog.php" },
          { selector: 'a.nav-link[href="contact.php"]', href: "contact.php" },
          { selector: 'a.nav-link[href="profile.php"]', href: "profile.php" },
          { selector: 'a.nav-link[href="cart.php"]', href: "cart.php" },
        ];

        // Loop through each link and add userId as a query parameter
        linksToUpdate.forEach((link) => {
          const element = document.querySelector(link.selector);
          if (element) {
            element.href = `${link.href}?userId=${userId}`;
          }
        });
      }

      // Call the function to update links
      addUserIdToLinks();

      // Function to format the current date as YYYY-MM-DD
      function getFutureDate(daysAhead) {
        const date = new Date();
        date.setDate(date.getDate() + daysAhead); // Add the specified number of days
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, "0"); // Months are zero-based
        const day = String(date.getDate()).padStart(2, "0");
        return `${year}-${month}-${day}`;
      }
      let amount;
      // Function to load user and cart data, then fetch product details for each item in the cart
      function loadOrderData() {
        fetch(`public/get_user_and_cart.php?userId=${userId}`)
          .then((response) => response.json())
          .then((data) => {
            if (data.error) {
              console.error(data.error);
              alert("Error: " + data.error);
              return;
            }
            amount = data.cart.products.length;
            // Populate user information shipping_city
            document.getElementById("shipping_street").innerText =
              data.user.username;
            document.getElementById("shipping_city").innerText =
              data.cart.products.length;
            document.getElementById("shipping_postalCode").innerText =
              getFutureDate(0);
            // Set the delivery date to 5 days from today
            document.getElementById("shipping_delivery").innerText =
              getFutureDate(5);

            <!-- document.getElementById("email").value = data.user.email; -->

            // Populate cart information
            const productTableBody =
              document.getElementById("product-table-body");
            productTableBody.innerHTML = ""; // Clear any existing rows
            let subtotal = 0;

            // Loop through each product in the cart and fetch its details
            data.cart.products.forEach((product) => {
              fetch(`public/get_product.php?productId=${product.productId}`)
                .then((response) => response.json())
                .then((productData) => {
                  if (productData.error) {
                    console.error(
                      "Error fetching product data:",
                      productData.error
                    );
                    return;
                  }

                  // Calculate total for the current product
                  const total = productData.price * product.quantity;
                  subtotal += total;

                  // Create a table row for the product
                  const row = document.createElement("tr");
                  row.innerHTML = `
    <td style="display: none;">${
      productData.productId
    }</td> <!-- Hidden Product ID -->
    <td><img src="${productData.images[0]}" alt="${
                    productData.name
                  }" class="img-fluid" width="50"></td>
    <td>${productData.name}</td>
    <td>${productData.description}</td>
    <td>${productData.category}</td>
    <td class="quantity-amount">${product.quantity}</td>
    <td class="product-price">$${productData.price.toFixed(2)}</td>
    <td class="product-total">$${(productData.price * product.quantity).toFixed(
      2
    )}</td>
`;

                  // Append the row to the table body
                  productTableBody.appendChild(row);

                  // Update subtotal and payment amount
                  document.getElementById(
                    "cart-subtotal"
                  ).innerText = `$${subtotal.toFixed(2)}`;
                  document.getElementById("amount").value = subtotal.toFixed(2);
                })
                .catch((error) =>
                  console.error("Error fetching product details:", error)
                );
            });

            // Set payment date to today's date
            document.getElementById("paymentDate").value = getFutureDate(0);
            document.getElementById("paymentStatus").value = "Pending"; // Example status
          })
          .catch((error) => {
            console.error("Error fetching data:", error);
            alert("An error occurred while fetching data.");
          });
      }

      // Call the function to load data when the page loads
      window.addEventListener("load", loadOrderData);

      document
        .getElementById("placeOrderButton")
        .addEventListener("click", function (e) {
          e.preventDefault(); // Prevent any default behavior
          placeOrder(); // Call the placeOrder function
        });

      function placeOrder() {
        // Gather shipping address data
        const shippingAddress = {
          street: document.getElementById("Street").value,
          city: document.getElementById("city").value,
          state: document.getElementById("state").value,
          postalCode: document.getElementById("postalCode").value,
        };

        // Check if all shipping address fields are filled
        if (
          !shippingAddress.street ||
          !shippingAddress.city ||
          !shippingAddress.state ||
          !shippingAddress.postalCode
        ) {
          cek_address = 1;
          alert("Please fill out all fields in the shipping address.");
          return; // Stop if any shipping address field is empty
        }

        // Gather payment data
        const payment = {
          amount: document.getElementById("amount").value,
          // Get the selected option's text instead of value
          paymentMethod:
            document.getElementById("paymentMethod").options[
              document.getElementById("paymentMethod").selectedIndex
            ].text,
          paymentDate: document.getElementById("paymentDate").value,
          paymentStatus: document.getElementById("paymentStatus").value,
          // historyDate: document.getElementById("historyDate").value,
        };

        // Validate payment method
        if (
          payment.paymentMethod !== "Bank Transfer" &&
          payment.paymentMethod !== "PayPal"
        ) {
          cek_payment = 1;
          alert(
            "Please select a valid payment method (Bank Transfer or PayPal)."
          );
          return; // Stop if payment method is not valid
        }

        // Gather order details
        const orderDetails = {
          userId: userId, // replace with actual user ID
          products: [], // Fill this array with product data from the cart
          totalAmount: amount,
          orderStatus: "pending",
          orderDate: new Date().toISOString(),
          deliveryDate: null, // You can update this later when the order is processed
        };

        // Example products in the cart (this should be dynamically generated based on actual cart items)
        document.querySelectorAll("#product-table-body tr").forEach((row) => {
          const product = {
            productId: row.cells[0].innerText, // Hidden Product ID in the first cell
            quantity: row.querySelector(".quantity-amount").innerText,
            price: row
              .querySelector(".product-price")
              .innerText.replace("$", ""),
          };
          orderDetails.products.push(product);
        });

        // Create the order data object
        const orderData = {
          shippingAddress,
          payment,
          orderDetails,
        };

        // Send the data to the server
        fetch("public/submit_order.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(orderData),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              alert("Order placed successfully!");
              window.location.href = "thankyou.php?userId=" + data.userId; 
            } else {
              alert("Failed to place order: " + data.error);
            }
          })
          .catch((error) => console.error("Error:", error));
      }

      // Add event listener to the "Place Order" button
      // Assuming `userId` is already defined
const thankYouButton = document.querySelector(
	'button.btn.btn-black.btn-lg.py-3.btn-block'
  );
  
  // Dynamically set the onclick attribute
  if (thankYouButton && userId) {
	thankYouButton.onclick = (e) => {
	  e.preventDefault();
	};
  }
  
    </script>

  <?php
include 'partial/footer.php';
?>
</html>
