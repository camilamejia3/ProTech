<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = "localhost";
$database = "id20847705_protech";
$username = "id20847705_protechuser";
$password = "000ProTech.com";

$conn = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection could not be established: " . mysqli_connect_error();
    exit();
} else {
    echo "Successfully connected...";
}

// Mapping of category names to their IDs
$categoryMapping = array(
    'Laptops' => 1,
    'Desktops' => 2,
    'Printers' => 3,
    'Cameras' => 4,
    'Security Cameras' => 5
);

// Check if the search term is provided
if (isset($_GET['search'])) {
    // Retrieve the search term from the query string
    $searchTerm = $_GET['search'];

    // Prepare the SQL query to fetch products based on the name and retrieve the corresponding category
    $sql = "SELECT p.*, c.Name AS category_name FROM products AS p
            INNER JOIN Category AS c ON p.CategoryId = c.CategoryID
            WHERE p.ProductName LIKE '%$searchTerm%' OR c.name LIKE '%$searchTerm%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was executed successfully
    if ($result === false) {
        echo "Query error: " . $conn->error;
        exit();
    }

    // Check if any rows wereHere's the continuation of the modified `fetch.php` file without including the `simplified-card.php` file:

```php
$sql = "SELECT p.*, c.Name AS CategoryId FROM products AS p
        INNER JOIN Category AS c ON p.CategoryId = c.CategoryID";

// Execute the query
$result = $conn->query($sql);

// Check if the query was executed successfully
if ($result === false) {
    echo "Query error: " . $conn->error;
    exit();
}

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch the results
    $products = array();

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

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
} else {
    // No products found
    echo "No products found";
}

// Close the database connection
$conn->close();
?>
