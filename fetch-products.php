<?php
$host = "localhost";
$database = "id20847705_protech";
$username = "id20847705_protechuser";
$password = "000ProTech.com";

// Establish the database connection
$conn = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection could not be established: " . mysqli_connect_error();
    exit;
}

// Fetch the product data
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Retrieve the product data
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Output the product data
    foreach ($products as $product) {
        echo "Product Name: " . $product['ProductName'] . "<br>";
        echo "Price: " . $product['Price'] . "<br>";
        echo "Product Description: " . $product['ProductDescription'] . "<br>";
        echo "Image URL: " . $product['ImageURL'] . "<br>";
        echo "Amazon Product Link: " . $product['AmazonProductLink'] . "<br>";
        echo "Rating: " . $product['Rating'] . "<br>";
        echo "<br>";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
