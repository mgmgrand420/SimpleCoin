<?php
// Check if the 'product' query parameter is set
if (isset($_GET['product'])) {
    $productId = $_GET['product'];

    // Load the JSON data from the file
    $jsonData = file_get_contents('products.json'); // Make sure the path is correct
    $products = json_decode($jsonData, true);

    // Search for the product by ID
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            // Product found, display the details
            ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo htmlspecialchars($product['name']); ?> Seeds</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!--  -->
<!--  -->
<!-- FontAwesome Icons, Bootstrap CSS Scoped -->
<style>
    @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
    @import url('');
    @import url('https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
    
    .nav-item.active a {
    background-color: #2596be; !important; /* Ensuring no background color is applied */
    color: #FFFFFF !important; /* Set the text color to your theme's blue */
}

/* Navbar Menu Item Color Adjustment */
.navbar .navbar-nav .nav-link {
    color: #FFFFFF; /* Default color for all menu items */
}

.navbar .navbar-nav .nav-link.active, .navbar .navbar-nav .nav-item:hover .nav-link {
    color: #007BFF; /* Dark blue for the active or hovered menu items */
    background-color: transparent; /* Ensuring no background color is applied */
}

/* Specific Adjustment for 'Home' Menu Item */
.navbar .navbar-nav .nav-item.home .nav-link {
    color: #007BFF !important; /* Ensuring 'Home' is always dark blue, even if active or hovered */
}

/* Navbar Menu Active Color */
.navbar .navbar-nav .nav-link.active, .navbar .navbar-nav .nav-item:hover .nav-link {
    color: #2596be; /* Vibrant green for active or hovered menu items */
}

/* Slider Border Color */
#slider, .splide__slide {
    border: 10px solid #6cace4; /* Lighter shade of blue for the slider border */
}

:root {
  --primary-color: #111509; /* Primary color for backgrounds, buttons, etc. */
  --secondary-color: #2596be; /* Secondary color for hover states, borders, etc. */
  --text-color: #FFFFFF; /* Primary text color */
  --background-color: #2596be; /* Light background color */
}

body {
  background-color: var(--background-color);
  color: var(--text-color);
}

.navbar {
  background-color: var(--primary-color) !important;
}
.tab-pane {
    
    color:#000000;
    
}

.nav-tabs .nav-link {
  color: var(--text-color) !important;
}

.nav-tabs .nav-link.active {
  background-color: var(--secondary-color) !important;
  border-color: var(--secondary-color) !important;
}
.container {
  background-color: var(--primary-color) !important;
  padding:10px;
}

/* Additional styles to maintain the original design */
.tab { padding: 10px; border: 3px solid #2596be; display: inline-block; cursor: pointer; background-color: #111509; font-family: cursive;color:#FFFFFF; }
.active { background-color: #2596be; color:#FFFFFF; font-family: cursive; font-weight: bold; }
.active.hover { background-color: #FFFFFF; }
.panel { display: none; padding: 20px; border: 5px solid #2596be; }
img {width: 100%; object-fit: cover; height: auto;}

.breeders img{ width: 100px; object-fit: cover; height: auto;}
     /* Add footer styling */
        .footer {
            padding: 2px 0;
            background-color: #2596be;
            text-align: center;
            margin-top: 2px;
            color:#FFFFFF;
        }
        
.card {
    
    background-color: #000000;
    
}


</style>   
   
  
 
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var hash = window.decodeURI(location.hash.replace('#', ''))
      if (hash !== '') {
        var element = document.getElementById(hash)
        if (element) {
          var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
          var clientTop = document.documentElement.clientTop || document.body.clientTop || 0
          var offset = element.getBoundingClientRect().top + scrollTop - clientTop
          // Wait for the browser to finish rendering before scrolling.
          setTimeout((function() {
            window.scrollTo(0, offset - 50)
          }), 0)
        }
      }
    })
  </script>
  
    <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    



  <!-- Navbar Here -->
<div class="container fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="https://btcseedbank.com">
            <img src="img/bitcoin-logo.png" alt="Logo" style="width: 250px;"> Bitcoin Crypto Single Seed Bank
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Navbar links -->
                <li class="nav-item active">
                    <a class="nav-link" href="https://btcseedbank.com"><i title="Home" class="fas fa-home"></i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tel:8337333872"><i title="Support: 1 (833) 733-3872" class="fas fa-headset"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/User"><i title="My Account" class="fas fa-user"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/"><i title="The Store" class="fas fa-store"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mailto:admin@btcseedbank.com"><i title="Contact: admin@btcseedbank.com" class="fas fa-envelope"></i> </a>
                </li>
            </ul>
        </div>
        <!-- New row for search and cart, using flex utilities for alignment -->
        <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <!--Google Search Form Here -->
            
                <div class="input-group">
                     <!-- Search Form Here -->
                    <script async src="https://cse.google.com/cse.js?cx=50c456abb1e424d1b"></script>
                    <div class="gcse-search"></div>
                    <div class="input-group-append">
                    </div>
                </div>
            
        <button data-toggle="modal" data-target="#cartModal" class="btn btn-outline-primary btn-sm ml-3" id="cartButton">  
       <i class="fas fa-shopping-cart"></i> <span  id="totalAmount">$0.00</span></button>

        </div>
    </nav>
    
</div>


<!-- Slider -->
<div class="container">
              
             <section id="image-carousel" class="splide" aria-label="Beautiful Images">
              <div class="splide__track">
		      <ul class="splide__list">
			    <li class="splide__slide">
				<a href="/"><img src="<?php echo htmlspecialchars($product['photo']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>"></a>
			    </li>
			    <li class="splide__slide">
				<a href="#"><img src="img/banner2.jpg" alt="" /></a>
			    </li>
			    <li class="splide__slide">
				<a href="#"><img src="img/banner3.jpg" alt="" /></a>
			   </li>
			   <li class="splide__slide">
				<a href="#"><img src="img/banner4.jpg" alt="" /></a>
			   </li>
		     </ul>
             </div>
             </section>
              
         
         <!-- End Slider -->
    </div>
<!-- End Top -->

                <div class="container mt-5">
    <div class="card">
        
     <div class="card-body">
        <div style="background-color: #333; color: white; padding: 5px; margin-top: 5px; border-radius: 10px;">
            <h2 style="background-color: #333; color: white; padding: 5px; margin-top:5px;" class="card-title"><?php echo htmlspecialchars($product['name']); ?></h2>
            <p style="background-color: #333; color: white; padding: 5px; margin-top:5px;"><?php echo htmlspecialchars($product['description']); ?></p>
            </div>
        <div style="background-color: #000; color: white; padding: 20px; margin-top: 15px; border-radius: 10px;">
         <div style="background-color: #000; color: white; padding: 5px; margin-top: 5px; border-radius: 10px;">
            <ul class="card-text" style="background-color: #2596be; color: white; padding: 5px; margin-top: 5px; border-radius: 10px;">
            <li style="background-color: #333;">Type: <?php echo htmlspecialchars($product['type']); ?></li>
            </ul>
            <ul class="card-text" style="background-color: #2596be; color: white; padding: 5px; margin-top: 5px; border-radius: 10px;">
            <li style="background-color: #333;">THC Content: <?php echo htmlspecialchars($product['thcContent']); ?></li>
            </ul>
            <ul class="card-text" style="background-color: #2596be; color: white; padding: 5px; margin-top: 5px; border-radius: 10px;">
            <li style="background-color: #333;">CBD Content: <?php echo htmlspecialchars($product['cbdContent']); ?></li>
            </ul>
         </div>
        </div>
        <div style="background-color: #333; color: white; padding: 5px; margin-top: 5px; border-radius: 10px;">
            
            <h2 style="background-color: #333; color: white; padding: 5px; margin-top:5px;">Price: <span style="color:red;">$<?php echo htmlspecialchars($product['price']); ?></span></small></h2>
            <!-- Add to Cart Button -->
            <button class="btn btn-primary add-to-cart" onclick="addToCart(this)" data-product='<?php echo json_encode($product); ?>'>Add to Cart</button>

        </div>
           
        </div>
    </div>
</div>

   <!-- Shopping Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Cart table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            <!-- Cart items will be inserted here -->
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <span>Total:</span>
                        <strong id="totalAmount">$0.00</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
    <!-- Checkout Button -->
    <button onclick="checkout()">Checkout with Coinbase</button>

    <script>
        function checkout() {
            // Fetch the total amount from the 'totalAmount' element
            var totalElement = document.getElementById('totalAmount');
            var totalText = totalElement.innerText || totalElement.textContent; // Compatibility with older browsers
            // Extract numerical value from the total amount text
            var total = totalText.replace(/[^0-9.-]+/g, "");

            // Send total to server to create a Coinbase charge
            fetch('/coinbasepay.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'total=' + total
            })
            .then(response => response.json())
            .then(data => {
                // Redirect user to Coinbase payment page
                window.location.href = data.checkoutUrl;
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <!-- Empty Cart and View Cart buttons -->
    <button type="button" class="btn btn-danger" id="emptyCartButton">Empty Cart</button>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cartModal">View Cart</button>
</div>


    
<footer class="footer">
   <div class="container">
        <p>© 2024 Bitcoin Seed Bank. All rights reserved. <br/> BTC SEED BANK is part of ©The Family!</p>
    </div>
</footer>
    



<!-- jQuery, Popper.js, Bootstrap JS, and Splide JS -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="coinbasecart.js"></script>
    <script src="modal.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#image-carousel').mount();
           // Initialize Splide
    var splide = new Splide('#slider', {
        type       : 'loop',
        perPage    : 1,
        autoplay   : false, // Initially, don't autopla
        pauseOnHover: false,
    }).mount();

    // Start autoplay using the play() method
    splide.play();
    });
    document.getElementById('emptyCartButton').addEventListener('click', function() {
    emptyCart();
});

</script>



</body>
</html>
<?php
break; // Exit the loop after the product is found
        }
    }
} else {
    // 'product' query parameter not set, display an error or a default message
    echo "<p>No product specified. Please provide a product ID in the query string.</p>";
}
?>
