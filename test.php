<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div id="products" class="row"></div> <!-- Product gallery -->
    <nav aria-label="Page navigation">
        <ul id="pagination" class="pagination justify-content-center"></ul> <!-- Pagination controls -->
    </nav>
</div>

<script>
 // Your WooCommerce store URL and API credentials
        const storeURL = 'https://cannabis-seed.us';
        const consumerKey = 'ck_837cb9f2239c4d986959e88fc3d9669b21d0ceab';
        const consumerSecret = 'cs_471b50c8077fd80fedecfec51ee5b15cdbd45d4b';
const authHeader = 'Basic ' + btoa(consumerKey + ':' + consumerSecret);

let currentPage = 1;
const perPage = 10; // Adjust based on your preference

function fetchProducts(page) {
    const endpoint = `${storeURL}/wp-json/wc/v3/products?per_page=${perPage}&page=${page}`;

    fetch(endpoint, {
        method: 'GET',
        headers: { 'Authorization': authHeader }
    })
    .then(response => {
        updatePagination(response.headers.get('X-WP-TotalPages'));
        return response.json();
    })
    .then(products => {
        const productsDiv = document.getElementById('products');
        productsDiv.innerHTML = ''; // Clear the gallery

        products.forEach(product => {
            const colDiv = document.createElement('div');
            colDiv.className = 'col-md-4 mb-4';

            const productLink = document.createElement('a');
            productLink.href = product.permalink;
            productLink.innerHTML = `
                <div class="card">
                    <img src="${product.images[0]?.src || 'placeholder-image-url'}" class="card-img-top" alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.short_description}</p>
                        <p><strong>${product.price_html}</strong></p>
                    </div>
                </div>
            `;

            colDiv.appendChild(productLink);
            productsDiv.appendChild(colDiv);
        });
    })
    .catch(error => console.error('Error:', error));
}

function updatePagination(totalPages) {
    const paginationUl = document.getElementById('pagination');
    paginationUl.innerHTML = ''; // Clear current pagination controls

    for (let page = 1; page <= totalPages; page++) {
        const li = document.createElement('li');
        li.className = `page-item ${currentPage === page ? 'active' : ''}`;
        li.innerHTML = `<a class="page-link" href="#">${page}</a>`;
        li.addEventListener('click', (e) => {
            e.preventDefault();
            currentPage = page;
            fetchProducts(currentPage);
        });
        paginationUl.appendChild(li);
    }
}

// Initial fetch
fetchProducts(currentPage);

</script>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>