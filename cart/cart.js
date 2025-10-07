$(document).ready(function() {
	var productItem = [{
			productName: "FinePix Pro2 3D Camera",
			price: "1800.00",
			photo: "camera.jpg"
		},
		{
			productName: "EXP Portable Hard Drive",
			price: "800.00",
			photo: "external-hard-drive.jpg"
		},
		{
			productName: "Luxury Ultra thin Wrist Watch",
			price: "500.00",
			photo: "laptop.jpg"
		},
		{
			productName: "XP 1155 Intel Core Laptop",
			price: "1000.00",
			photo: "watch.jpg"
		}];
	showProductGallery(productItem);
	showCartTable();
});

function addToCart(element) {
    // Assuming 'element' is the clicked button within a product item container
    var productParent = $(element).closest('.product-item');

    // Fetch product details from the DOM
    var productName = productParent.find('.product-name').text(); // Adjust selector as needed
    var price = parseFloat(productParent.find('.product-price').text().replace('$', '')).toFixed(2); // Adjust selector as needed
    var quantity = parseInt(productParent.find('.product-quantity').val(), 10); // Adjust selector if needed and ensure input for quantity

    // Create or update the product object
    var product = {
        name: productName, // Use 'name' to keep it consistent
        price: price,
        quantity: quantity
    };

    // Load or initialize the cart
    var cart = JSON.parse(sessionStorage.getItem('shopping-cart') || '[]');

    // Check if product already exists in the cart
    var existingProductIndex = cart.findIndex(p => p.name === productName);
    if (existingProductIndex !== -1) {
        // Product exists, update the quantity
        cart[existingProductIndex].quantity += quantity;
    } else {
        // New product, add to the cart
        cart.push(product);
    }

    // Save the updated cart to session storage
    sessionStorage.setItem('shopping-cart', JSON.stringify(cart));

    // Optionally, refresh the cart display to reflect the update
    showCartTable();
}


function emptyCart() {
	if (sessionStorage.getItem('shopping-cart')) {
		// Clear JavaScript sessionStorage by index
		sessionStorage.removeItem('shopping-cart');
		showCartTable();
	}
}



function removeCartItem(index) {
	if (sessionStorage.getItem('shopping-cart')) {
		var shoppingCart = JSON.parse(sessionStorage.getItem('shopping-cart'));
		sessionStorage.removeItem(shoppingCart[index]);
		showCartTable();
	}
}

function showCartTable() {
	var cartRowHTML = "";
	var itemCount = 0;
	var grandTotal = 0;

	var price = 0;
	var quantity = 0;
	var subTotal = 0;

	if (sessionStorage.getItem('shopping-cart')) {
		var shoppingCart = JSON.parse(sessionStorage.getItem('shopping-cart'));
		itemCount = shoppingCart.length;

		//Iterate javascript shopping cart array
		shoppingCart.forEach(function(item) {
			var cartItem = JSON.parse(item);
			price = parseFloat(cartItem.price);
			quantity = parseInt(cartItem.quantity);
			subTotal = price * quantity

			cartRowHTML += "<tr>" +
				"<td>" + cartItem.productName + "</td>" +
				"<td class='text-right'>$" + price.toFixed(2) + "</td>" +
				"<td class='text-right'>" + quantity + "</td>" +
				"<td class='text-right'>$" + subTotal.toFixed(2) + "</td>" +
				"</tr>";

			grandTotal += subTotal;
		});
	}

	$('#cartTableBody').html(cartRowHTML);
	$('#itemCount').text(itemCount);
	$('#totalAmount').text("$" + grandTotal.toFixed(2));
}


function showProductGallery(product) {
	//Iterate javascript shopping cart array
	var productHTML = "";
	product.forEach(function(item) {
		productHTML += '<div class="product-item">'+
					'<img src="product-images/' + item.photo + '">'+
					'<div class="productname">' + item.productName + '</div>'+
					'<div class="price">$<span>' + item.price + '</span></div>'+
					'<div class="cart-action">'+
						'<input type="text" class="product-quantity" name="quantity" value="1" size="2" />'+
						'<input type="submit" value="Add to Cart" class="add-to-cart" onClick="addToCart(this)" />'+
					'</div>'+
				'</div>';
				"<tr>";
		
	});
	$('#product-item-container').html(productHTML);
}
