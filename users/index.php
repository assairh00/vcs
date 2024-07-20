<?php
session_start();
include("auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Virtual Coffee Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2Hhh_14Uam62GXGaTMcXWhhVkYg0EbDY&callback=initMap" async defer></script>

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/convo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico"><!-- Favicon / Icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
</head>

<body>
    <!-- HEADER SECTION -->
    <header class="header">
        <a href="#" class="logo">
            <img src="../assets/images/cafe_logo1.png" class="img-logo" alt="KapeTann Logo">
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
                <li class="nav-item">
                            <a href="#contact" class="text-decoration-none">Contact</a>
                        </li>

                    <a href="logout.php" class="text-decoration-none">Logout</a>
                </li>
            </ul>
            </div>
        </nav>
        <div class="icons">
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

   
        <!-- CART SECTION -->
        <div class="cart">
    <h2 class="cart-title">Your Cart:</h2>
    <div class="cart-content">
    <?php
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo '<div class="cart-item">';
            echo '<span class="item-title">' . htmlspecialchars($item['title']) . '</span>';
            echo '<span class="item-price">' . htmlspecialchars($item['price']) . '</span>';
            echo '</div>';
        }
    } else {
        echo '<p></p>';
    }
    ?>
    </div>
    <div class="total">
        <div class="total-title">Total: </div>
        <div class="total-price">0 dh</div>
    </div>
    <!-- BUY BUTTON -->
    <button type="button" class="btn-buy" onclick="redirectToCheckout()">Checkout Now</button>
</div>
</header>


    <!-- HERO SECTION -->
    <section class="home" id="home">
        <div class="content">
            <h3>Welcome <?php echo $_SESSION['username']; ?>!</h3>
            <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section class="about" id="about">
        <h1 class="heading"> <span>About</span> Us</h1>
        <div class="row g-0">
            <div class="image">
                <img src="../assets/images/about-img.png" alt="" class="img-fluid">
            </div>
            <div class="content">
                <h3>Welcome your virtual coffee shop</h3>
                <p>
                Welcome to The Virtual Coffee Shop, where our passion for coffee fuels 
                every cup we brew. We are committed to bringing you the finest coffee experience, 
                carefully sourcing the best beans from around the world. Our expert roasters 
                ensure that each batch is roasted to perfection, capturing the unique flavors 
                and aromas of each origin. At The Virtual Coffee Shop, we believe that coffee is more than 
                just a beverage; it's a journey of discovery and delight.
                </p>
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
                        <img src="../assets/images/cart-item-1.png" alt="" class="product-img">
                        <h3 class="product-title">Americano - Hot Espresso </h3>
                        <div class="price">45.00 dh</div>
                        <select class="form-select size-select mb-2">
                            <option value="Sugar Free" selected>Sugar-Free</option>
                            <option value="Sugar">With Sugar</option>
                        </select>
                        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
                    </div>
                </div>
                <br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/cart-item-2.png" alt="" class="product-img">
                        <h3 class="product-title">Colombian Supremo Cup </h3>
                        <div class="price">60.00 dh</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="large" selected>Large</option>
                            <option value="small">Small</option>
                        </select>
                        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
                    </div>
                </div>
                <br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/cart-item-3.png" alt="" class="product-img">
                        <h3 class="product-title">Nitro Cold Brew</h3>
                        <div class="price">50.00 dh</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="honey" selected>Honey</option>
                            <option value="vanilla">Vanilla</option>
                            <option value="cinnamon">Cinnamon</option>
                            <option value="classic">Classic</option>
                        </select>
                        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
                    </div>
                </div>
            </div><br />
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/cart-item-4.png" alt="" class="product-img">
                        <h3 class="product-title">Seasonal Single-Origin </h3>
                        <div class="price">30.00 dh</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="brazilian" selected>Brazilian Java</option>
                            <option value="mexican">Mexican Chiapas</option>
                            <option value="guatemalan">Guatemalan Antigua</option>
                        </select>
                        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
                    </div>
                </div><br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/cart-item-5.png" alt="" class="product-img">
                        <h3 class="product-title">Indonesian Sumatra Mandheling </h3>
                        <div class="price">40.00 dh</div>
                        <select class="form-select size-select mb-2">
                            <option value="Sugar Free" selected>Sugar-Free</option>
                            <option value="Sugar">With Sugar</option>
                        </select>
                        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
                    </div>
                </div><br />
                <div class="col-md-4">
                    <div class="box">
                        <img src="../assets/images/cart-item-6.png" alt="" class="product-img">
                        <h3 class="product-title">Mint Mojito Iced Coffee </h3>
                        <div class="price">55.00 dh</div>
                        <select class="form-select size-select mb-2" onchange="updatePrice(this)">
                            <option value="large" selected>Large</option>
                            <option value="small">Small</option>
                        </select>
                        <a class="btn add-cart" onclick="addCartClicked(this)">Add to Cart</a>
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
    <script src="../assets/js/googleSignIn.js"></script>
    <script src="../assets/js/script_logged.js"></script>
    <script src="../assets/js/cart.js"></script>
    <script src="../assets/js/responses.js"></script>
    <script src="../assets/js/convo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN MENU
        $(document).ready(function() {
            $(".row-to-hide").hide();
            $("#showHideBtn").text("SHOW MORE");
            $("#showHideBtn").click(function() {
                $(".row-to-hide").toggle();
                if ($(".row-to-hide").is(":visible")) {
                    $(this).text("SHOW LESS");
                } else {
                    $(this).text("SHOW MORE");
                }
            });
        });

        // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN GALLERY
        $(document).ready(function() {
            $(".pic-to-hide").hide();
            $("#showBtn").text("SHOW MORE");
            $("#showBtn").click(function() {
                $(".pic-to-hide").toggle();
                if ($(".pic-to-hide").is(":visible")) {
                    $(this).text("SHOW LESS");
                } else {
                    $(this).text("SHOW MORE");
                }
            });
        });

        // JavaScript function to redirect to checkout page with product details
function redirectToCheckout(title, price, quantity) {
    // Redirect to checkout.php and pass parameters in the URL
    window.location.href = 'checkout.php?name=' + encodeURIComponent(name) + '&price=' + encodeURIComponent(price) + '&quantity=' + encodeURIComponent(quantity);
}


    </script>
</body>

</html>