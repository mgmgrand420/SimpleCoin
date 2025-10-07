// Load products from the JSON file and display them
$(document).ready(function() {
    $.getJSON('products.json', function(products) {
        showProductGallery(products);
    });

    $('#emptyCartButton').click(function() {
        emptyCart();
    });

    // Load cart from session storage on page load
    showCartTable();
});

function showProductGallery(products) {
    // Initialize an empty string to build the HTML
    var productHTML = '';

    // Iterate over each product in the products array
    products.forEach(function(item) {
        // Concatenate HTML string for each product
        // Including product image, name, price, type, THC content, CBD content, and description
        productHTML += '<div class="col-md-4">' +
            '<div class="card">' +
            // Wrap the image in a link that points to the product.php page with the correct product ID
            // Apply a 5px border around the image
            '<a href="product.php?product=' + item.id + '" style="display: block; border: 5px solid #2596be; margin: 10px;">' +
            '<img src="' + item.photo + '" class="card-img-top" alt="' + item.name + '" style="display: block; max-width: 100%; height: auto;">' +
            '</a>' +
            '<div class="card-body">' +
            // Wrap the product name in a link as well
            // Change the background color of the product title to a darker gray
            '<h2 class="card-title" style="background-color: #333; color: white; padding: 10px; margin-top: -25px;"><a href="product.php?product=' + item.id + '" style="color: white; text-decoration: none;">' + item.name + '</a></h2>' +
            // Display the product price
            '<h3 class="card-text">Price:<span style="color:red;"> $' + item.price + '</span></h3>' +
            // Include the Add to Cart button
            '<button class="btn btn-primary add-to-cart" onclick="addToCart(this)" data-product=\'' + JSON.stringify(item) + '\'>Add to Cart</button>' +
            '</div>' + // Close card-body div
            '</div>' + // Close card div
            '</div>';  // Close col-md-4 div
    });

    // Insert the productHTML into the element with id 'product-grid'
    $('#product-grid').html(productHTML);
}





function addToCart(button) {
    var product = $(button).data('product'); // Ensure this contains { name, price, ... }
    var cart = JSON.parse(sessionStorage.getItem('shopping-cart') || '[]');

    var existingProduct = cart.find(p => p.name === product.name);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        product.quantity = 1;
        cart.push(product);
    }

    sessionStorage.setItem('shopping-cart', JSON.stringify(cart));
    showCartTable();
}


function showCartTable() {
    var cart = JSON.parse(sessionStorage.getItem('shopping-cart') || '[]'); // Load cart from session storage or initialize as an empty array
    var cartHTML = '';
    var totalAmount = 0;

    cart.forEach(function(item) {
        var subTotal = item.quantity * parseFloat(item.price); // Calculate subtotal for each item
        totalAmount += subTotal; // Add to the total amount

        cartHTML += `<tr>
            <td>${item.name}</td> <!-- Use item.name -->
            <td>$${parseFloat(item.price).toFixed(2)}</td>
            <td>${item.quantity}</td>
            <td>$${subTotal.toFixed(2)}</td>
        </tr>`;
    });

    $('#cartTableBody').html(cartHTML); // Update the cart table's HTML
    $('#totalAmount').text(`$${totalAmount.toFixed(2)}`); // Update the total amount displayed
}


function updateCartDisplay() {
    var cart = JSON.parse(sessionStorage.getItem('cart') || '[]'); // Retrieve the cart from storage
    var cartHTML = '';

    if (cart.length > 0) {
        cart.forEach(function(item) {
            cartHTML += `<div class="cart-item">
                <h5 class="cart-item-title">${item.name}</h5> <!-- Use item.name -->
                <p class="cart-item-price">$${item.price}</p>
                <p class="cart-item-quantity">Quantity: ${item.quantity}</p>
                <button class="btn btn-sm btn-danger remove-item" data-product-name="${item.name}">Remove</button> <!-- Use item.name -->
            </div>`;
        });
    } else {
        cartHTML = '<p>Your cart is empty.</p>';
    }

    $('#cartItems').html(cartHTML); // Update the modal's content

    // Update the total price display
    var total = calculateCartTotal();
    $('#cartTotal').text(`Total: $${total}`);

    // Attach event listeners to remove buttons (if any)
    $('.remove-item').click(function() {
        var productName = $(this).data('product-name');
        removeFromCart(productName);
        updateCartDisplay(); // Refresh the cart display
    });
}

function emptyCart() {
    sessionStorage.removeItem('shopping-cart'); // Ensure this key matches throughout your code
    showCartTable(); // Call to update the UI after emptying the cart
}


function createCoinbaseCharge() {
    // Retrieve the total from calculateCartTotal function, which computes the total based on the cart in sessionStorage
    var cartTotal = calculateCartTotal();

    // Now use this cartTotal in your AJAX request
    $.ajax({
        type: "POST",
        url: "coinbasepay.php",
        data: { total: cartTotal }, // Pass the total as part of the request
        success: function(response) {
            // Assuming the response from the server includes the URL to the Coinbase payment page
            var data = JSON.parse(response);
            if (data && data.hosted_url) {
                window.location.href = data.hosted_url; // Redirect the user to the Coinbase payment page
            } else {
                alert("There was an issue initiating the payment. Please try again.");
            }
        },
        error: function() {
            alert("There was an error processing the payment. Please try again.");
        }
    });
}

