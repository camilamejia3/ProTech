<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplified Product Card</title>
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .product-card {
            max-width: 12em;
            background-color: #fff;
            padding: 1em;
            box-shadow: 0 5px 5px #e1e1e1;
            font-family: Arial, Helvetica, sans-serif;
        }

        .product-card img {
            max-width: 100%;
        }

        .product-card h4 {
            font-size: 1.3em;
            margin: 0.5em 0;
            font-weight: bold;
            font-family:'Fjalla One', sans-serif;
            color:#2A2A72;
        }

        .product-card div {
            font-size: 1.2em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #36454F;
        }

        .product-card button {
            background-color: #2A2A72;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 8px 12px;
            font-size: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease-in-out;
            cursor: pointer;
            width: 100px; /* Set a fixed width for the button */
            font-family: 'Fjalla One', sans-serif;
        }

        .product-card button:hover {
            background-color: #333;
        }

        .product-card:hover {
            background-color: #BDB5D5;
            color: #fff;
        }

        .product-card:hover button {
            color: #000;
            background-color: #fff;
        }

        @media screen and (max-width: 576px) {
            .product-card {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
       <div class="product-grid">
        <?php
        $host = "localhost";
        $database = "id20847705_protech";
        $username = "id20847705_protechuser";
        $password = "000ProTech.com";

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

            // Output the product cards
            foreach ($products as $product) {
                echo '<div class="product-card" onclick="window.location.href=\'detailed_product.php?id=' . $product['id'] . '\'">';
                echo '<img src="' . $product['ImageURL'] . '" alt="Product Image">';
               echo '<h4>' . $product['ProductName'] . '</h4>';
                echo '<div>';
                echo '<span>$' . $product['Price'] . '</span>';
                echo '<button onclick="event.stopPropagation(); window.location.href=\'' . $product['AmazonProductLink'] . '\'">Shop Now</button>';

                echo '</div>';
                echo '</div>';
            }

            // Free the result set
            mysqli_free_result($result);
        } else {
            echo "Error executing the query: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div> <!-- Closing tag for product-grid -->
</body>
</html>
