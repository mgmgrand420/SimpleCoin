<?php
$products = json_decode(file_get_contents('products.json'), true);

// Start the XML string
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Loop through each product and add it to the sitemap
foreach ($products as $product) {
    $sitemap .= '<url>';
    $sitemap .= '<loc>http://btcseedbank.com/product.php?product=' . htmlspecialchars($product['id']) . '</loc>';
    $sitemap .= '<changefreq>weekly</changefreq>';
    $sitemap .= '<priority>0.8</priority>';
    $sitemap .= '</url>';
}


// Close the urlset tag
$sitemap .= '</urlset>';

// Write the XML contents to a file
file_put_contents('sitemap.xml', $sitemap);
?>
