<?php
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

// Check if the search term is provided
if (isset($_GET['search'])) {
    // Retrieve the search term from the query string
    $searchTerm = $_GET['search'];

    // Prepare the SQL query to fetch products based on the name and retrieve the corresponding category
    $sql = "SELECT p.*, c.name AS category_name FROM products AS p
            INNER JOIN Category AS c ON p.CategoryID = c.CategoryID
            WHERE p.ProductName LIKE '%$searchTerm%'";

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

        // Convert the result to JSON and output it
        echo json_encode($products);
    } else {
        // No product found
        echo "No product found";
    }
} else {
    // Search term is not provided
    echo "Search term is missing";
}

// Close the database connection
$conn->close();
?>
