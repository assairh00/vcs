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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Hhh_14Uam62GXGaTMcXWhhVkYg0EbDY&callback=initMap" async defer></script>

        <!-- Custom CSS File Link -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/convo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"><!-- Favicon / Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
        <style>
            .size-select {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }
        </style>
    </head>
    <body>
        <!-- HEADER SECTION -->
        <header class="header">
            <a href="#" class="logo">
                <img src="assets/images/cafe_logo1.png" class="img-logo" alt="KapeTann Logo">
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
                </div>
            </nav>
            <div class="icons">
                <div class="fas fa-shopping-cart" id="cart-btn" onclick="redirectCart()"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>
            
            <!-- CART SECTION -->
            <div class="cart">
                <h2 class="cart-title">Your Cart:</h2>
                <div class="cart-content">
                    
                </div>
                <div class="total">
                    <div class="total-title">Total: </div>
                    <div class="total-price">₱0</div>
                </div>
                <!-- BUY BUTTON -->
                <button type="button" class="btn-buy">Checkout Now</button>
            </div>
        </header>

        <!-- HERO SECTION -->
        <section class="home" id="home">
            <div class="content">
                <h3>Brewed to Perfection, Savored Anywhere</h3>
                <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
            </div>
        </section>

        <!-- ABOUT US SECTION -->
        <section class="about" id="about">
            <h1 class="heading"> <span>About</span> Us</h1>
            <div class="row g-0">
                <div class="image">
                    <img src="assets/images/about-img.png" alt="" class="img-fluid">
                </div>
                <div class="content">
                    <h3>Welcome to your Virtual Coffee Shop</h3>

                    <p>
                    In our virtual space, we aim to recreate the cozy, inviting atmosphere of a traditional coffee shop.
                 Whether you're starting your day, taking a break, or connecting with friends, The Virtual Coffee Shop
                 is your go-to destination for exceptional coffee and community. Join us in exploring the rich, 
                 diverse world of coffee from the comfort of your own home.
                    </p>
 
                </div>
            </div>
        </section>

        <!-- MENU SECTION -->
        <section class="menu" id="menu">
    <h1 class="heading">Our <span>Menu</span></h1>
    <div class="box-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <img src="assets/images/cart-item-1.png" alt="" class="product-img">
                        <h3 class="product-title">Americano - Hot Espresso </h3>
                        <div class="price">₱45.00</div>
                        <select class="form-select size-select mb-2">
                            <option value="Sugar Free" selected>Sugar-Free</option>
                            <option value="Sugar">With Sugar</option>
                        </select>
                       <a class="btn add-cart" href="http://localhost/vcs1/users/login.php">Add to Cart</a>
                    </div>
                </div>
                <br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="assets/images/cart-item-2.png" alt="" class="product-img">
                        <h3 class="product-title">Colombian Supremo Cup </h3>
                        <div class="price">₱60.00</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="large" selected>Large</option>
                            <option value="small">Small</option>
                        </select>
                        <a class="btn add-cart" href="http://localhost/vcs1/users/login.php">Add to Cart</a>
                    </div>
                </div>
                <br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="assets/images/cart-item-3.png" alt="" class="product-img">
                        <h3 class="product-title">Nitro Cold Brew</h3>
                        <div class="price">₱50.00</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="honey" selected>Honey</option>
                            <option value="vanilla">Vanilla</option>
                            <option value="cinnamon">Cinnamon</option>
                            <option value="classic">Classic</option>
                        </select>
                        <a class="btn add-cart" href="http://localhost/vcs1/users/login.php">Add to Cart</a>
                    </div>
                </div>
            </div><br />
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <img src="assets/images/cart-item-4.png" alt="" class="product-img">
                        <h3 class="product-title">Seasonal Single-Origin </h3>
                        <div class="price">₱30.00</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="brazilian" selected>Brazilian Java</option>
                            <option value="mexican">Mexican Chiapas</option>
                            <option value="guatemalan">Guatemalan Antigua</option>
                        </select>
                        <a class="btn add-cart" href="http://localhost/vcs1/users/login.php">Add to Cart</a>
                    </div>
                </div><br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="assets/images/cart-item-5.png" alt="" class="product-img">
                        <h3 class="product-title">Indonesian Sumatra Mandheling </h3>
                        <div class="price">₱40.00</div>
                        <select class="form-select size-select mb-2">
                            <option value="Sugar Free" selected>Sugar-Free</option>
                            <option value="Sugar">With Sugar</option>
                        </select>
                        <a class="btn add-cart" href="http://localhost/vcs1/users/login.php">Add to Cart</a>
                    </div>
                </div><br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="assets/images/cart-item-6.png" alt="" class="product-img">
                        <h3 class="product-title">Mint Mojito Iced Coffee </h3>
                        <div class="price">₱55.00</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="large" selected>Large</option>
                            <option value="small">Small</option>
                        </select>
                        <a class="btn add-cart" href="http://localhost/vcs1/users/login.php">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

            </div>
        </div>
    </section>

      
         <!-- CONTACT US SECTION -->
      <section class="contact" id="contact">
            <h1 class="heading"><span>Contact</span> Us</h1>
            <div class="row">
                <form name="contact" method="POST" action="#">
                    <h3> Get in touch with us!</h3>
                    <div class="inputBox">
                        <span class="fas fa-envelope"></span>
                        <input type="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="inputBox">
                        <textarea name="message" placeholder="Enter your message..."></textarea>
                    </div>
                    <button type="submit" class="btn">Contact Now</button>
                </form>
            </div>
        </section>


        <!-- JS File Link -->
         <script src="assets/js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            // CODE FOR THE FORMSPREE
            window.onbeforeunload = () => {
                for(const form of document.getElementsByTagName('form')) {
                    form.reset();
                }
            }

            // CODE FOR THE REDIRECT CART
            function redirectCart() {
                // Check if the user is logged in
                if(!"<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : '' ?>") {
                    // Redirect the user to the login page
                    alert("You are not logged in. Please log into your account and try again.");
                    window.location.href = "users/login.php";
                }
            }
        </script> 
    </body>
</html>