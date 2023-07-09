<?php
// Start the session
session_start();

// Check if products are stored in session data
if (isset($_SESSION['products'])) {
    // Retrieve the products from session data
    $products = $_SESSION['products'];

    // Display the product information
    foreach ($products as $product) {
        echo "<div>";
        echo "<img src=\"" . $product['ImageURL'] . "\" alt=\"" . $product['ProductName'] . "\"><br>";
        echo "Product Name: " . $product['ProductName'] . "<br>";
        echo "Price: " . $product['Price'] . "<br>";
        echo "Product Description: " . $product['ProductDescription'] . "<br>";
        // Display other product details as needed
        echo "<a href='" . $product['AmazonProductLink'] . "' class='buy-now'>Buy Now</a>";
        echo "</div><br>";
    }

    // Clear the stored products from session data
    unset($_SESSION['products']);
} else {
    // No products found
    echo "No products found";
}
?>
