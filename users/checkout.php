<?php
  session_start();

  // Check if chosen product details are stored in session
  if (isset($_SESSION['chosenProduct'])) {
    $chosenProduct = json_decode($_SESSION['chosenProduct'], true); // Decode JSON string
  } else {
    // Handle the case where no product is chosen (optional: display message)
    $chosenProduct = null;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>KapeTann Brewed Coffee Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/checkout.css">
    <link rel="stylesheet" href="../assets/css/convo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"><!-- Favicon / Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
 
</head>
<body>
    <!-- HEADER SECTION -->
    <header class="header">
        <a href="#" class="logo">
            <img src="../assets/images/logo.png" style="position: relative;" class="img-logo" alt="KapeTann Logo">
        </a>

        <!-- MAIN MENU FOR SMALLER DEVICES -->
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#home" class="text-decoration-none">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="text-decoration-none">About</a>
                </li>
                <li class="nav-item">
                    <a href="#menu" class="text-decoration-none">Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="text-decoration-none">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="users/login.php" class="text-decoration-none">Login</a>
                </li>
            </ul>
        </nav>

        <!-- Icons for Cart and Menu -->
        <div class="icons">
            <div class="fas fa-shopping-cart" id="cart-btn" onclick="redirectCart()"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <!-- CART SECTION -->
        <div class="cart">
            <h2 class="cart-title">Your Cart:</h2>
            <div class="cart-content">
                <!-- Cart content goes here -->
            </div>
            <div class="total">
                <div class="total-title">Total: </div>
                <div class="total-price">₱0</div>
            </div>
            <!-- BUY BUTTON -->
            <button type="button" class="btn-buy">Checkout Now</button>
        </div>
    </header>

    <!-- MAIN CONTENT SECTION -->
    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Product Details Section -->
                    <div class="product-details mb-4">
                        <h2>Product Details</h2>
                        <?php
                        // Check if product details are passed via URL
                        if (isset($_GET['title'], $_GET['price'], $_GET['quantity'], $_GET['subtotal_amount'], $_GET['size'])) {
                            $title = $_GET['title'];
                            $price = $_GET['price'];
                            $quantity = $_GET['quantity'];
                            $subtotalAmount = $_GET['subtotal_amount'];
                            $size = $_GET['size'];
                        
                            // Display the product details
                            echo "<p><strong>Product Name:</strong> $title</p>";
                            echo "<p><strong>Price:</strong> ₱$price</p>";
                            echo "<p><strong>Quantity:</strong> $quantity</p>";
                            echo "<p><strong>Subtotal:</strong> ₱$subtotalAmount</p>";
                            echo "<p><strong>Size:</strong> $size</p>";
                        } else {
                            echo "<p>No product details found.</p>";
                        }
                        ?>
                    </div>

                    <!-- Delivery Information Form -->
                    <h2>Delivery Information</h2>
                    <form class="delivery-form mb-4">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter your address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                        </div>
                    </form>

                    <!-- Payment Methods and Credit Card Form -->
                    <h2>Select Payment Method</h2>
                    <div class="payment-buttons mb-4">
                        <a href="https://www.paypal.com/login" class="btn btn-primary" target="_blank">
                            <i class="fab fa-paypal"></i> PayPal
                        </a>
                        <a href="https://pay.google.com/gp/w/home/signup" class="btn btn-primary" target="_blank">
                            <i class="fab fa-google"></i> Google Pay
                        </a>
                    </div>
                    <div class="credit-card-form">
                        <h2>Credit Card Information</h2>
                        <form>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="Enter your card number">
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="expirationDate" class="form-label">Expiration Date</label>
                                    <input type="text" class="form-control" id="expirationDate" placeholder="MM/YYYY">
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn btn-success">Pay now</button>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!-- JS File Links -->
    <script src="../assets/js/googleSignIn.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/cart.js"></script>
    <script src="../assets/js/responses.js"></script>
    <script src="../assets/js/convo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        // Your additional JavaScript code here
    </script>
</body>
</html>

