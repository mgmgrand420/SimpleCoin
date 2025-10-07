$(document).ready(function() {
    // Load products from products.json and display
    $.getJSON('products.json', function(products) {
        // Function to display products on the page
        displayProducts(products);
    });

    // Function to calculate and update cart total
    function updateCartTotal() {
        // Assuming a function calculateCartTotal exists
        var cartTotal = calculateCartTotal();
        $('#cartTotalInput').val(cartTotal);
    }

    // Event listener for the modal opening
    $('#cartModal').on('show.bs.modal', function () {
        updateCartTotal();
    });
});

function displayProducts(products) {
    var productsHTML = '';
    products.forEach(function(item) {
        productsHTML += `<div class="col-md-4 mb-4">
            <div class="card">
                <img src="${item.photo}" class="card-img-top" alt="${item.productName}">
                <div class="card-body">
                    <h5 class="card-title">${item.productName}</h5>
                    <p class="card-text">$${item.price}</p>
                    <button class="btn btn-primary add-to-cart" data-product='${JSON.stringify(item)}'>Add to Cart</button>
                </div>
            </div>
        </div>`;
    });
    $('#product-grid').html(productsHTML);

    // Attach click event listener to "Add to Cart" buttons
    $('.add-to-cart').click(function() {
        var productData = $(this).data('product');
        addToCart(productData);
        updateCartDisplay(); // A function you'll define to update the cart display
    });
}
function calculateCartTotal() {
    var total = 0;
    var cart = JSON.parse(sessionStorage.getItem('cart') || '[]'); // Retrieve cart from sessionStorage or initialize an empty cart

    cart.forEach(function(item) {
        total += item.price * item.quantity;
    });

    return total.toFixed(2); // Returns the total as a string, fixed to 2 decimal places
}
function addToCart(productData) {
    // Parse the stored cart from sessionStorage, or initialize an empty array if none exists
    var cart = JSON.parse(sessionStorage.getItem('cart') || '[]');

    // Check if the product is already in the cart
    var existingProduct = cart.find(item => item.productName === productData.productName);
    if (existingProduct) {
        // If the product exists, increment its quantity
        existingProduct.quantity++;
    } else {
        // If the product is new, add it to the cart with a quantity of 1
        productData.quantity = 1;
        cart.push(productData);
    }

    // Update the cart in sessionStorage with the new cart array
    sessionStorage.setItem('cart', JSON.stringify(cart));

    // Optionally, call a function to update the cart display on the page
    updateCartDisplay();
}
function updateCartDisplay() {
    var cart = JSON.parse(sessionStorage.getItem('cart') || '[]');
    var cartHTML = '';

    cart.forEach(function(item) {
        cartHTML += `<p>${item.productName} - Quantity: ${item.quantity}</p>`;
    });

    // Assuming you have a div with id="cartItems" in your modal for displaying cart items
    $('#cartItems').html(cartHTML);

    // Update the total using the calculateCartTotal function
    var total = calculateCartTotal();
    // Assuming you have a span with id="cartTotal" for displaying the total
    $('#cartTotal').text(`Total: $${total}`);
}

