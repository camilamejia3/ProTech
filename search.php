<?php
// Retrieve the search term from the query string
$searchTerm = $_GET['search'];

// Check if the search term is provided
if (!empty($searchTerm)) {
    // Database connection settings
    $host = "localhost";
    $database = "id20847705_protech";
    $username = "id20847705_protechuser";
    $password = "000ProTech.com";

    // Create a new database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchTerm%'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output the results
        $products = array();

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        // Convert the result to JSON and output it
        echo json_encode($products);
    } else {
        echo "No products found.";
    }

    $conn->close();
}
?>
