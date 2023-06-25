<?php
$host = "localhost";
$database = "id20847705_protech";
$username = "id20847705_protechuser";
$password = "000ProTech.com";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the product ID from the URL parameter
if (!isset($_GET['id'])) {
    die("Product ID not specified.");
}
$productId = $_GET['id'];

// Fetch the specific product from the database
$sql = "SELECT * FROM products WHERE id = " . $productId;
$result = $conn->query($sql);

// Check if the query was successful and the product was found
if ($result && $result->num_rows === 1) {
    $product = $result->fetch_assoc();

    // Include the header file
    include 'header.php';
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@100;200&display=swap" rel="stylesheet">


    <style>
 
        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 1.5in;
            margin-right: 1.5in;
            padding-top: 50px;
        }

        .product-card {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            border: none;
        }

        .product-image {
            margin-right: 40px;
        }

        .product-image img {
            max-width: 480px;
            height: 480px;
        }

        .product-details {
            font-family:'Poppins', sans-serif;
            padding-top: 10px; /* Add padding to separate the rating from the product description */
            font-size: 18px;
        }

        .product-details h1 {
            font-size: 50px;
            margin-top: 0;
            font-family:'Fjalla One', sans-serif;
            color:#2A2A72;
        }

        .product-details h2 {
            font-size: 30px;
            margin-top: 10px;
            color: #36454F;
            padding-bottom: 20px;
        }

        .product-details .desc {
            margin-top: 10px;
        }

        .product-details .rating {
            margin-top: 30px;
            font-size: 20px; /* Increase the font size for the rating */
        }
        
        .product-details .rating .star {
              display: inline-block;
              margin-right: 2px;
              font-size: 20px;
              color: #FDD835;
              border-radius: 50%; /* Make the star icons round */
              background-color: transparent; /* Remove the background color */
              color: #FDCB5A; /* Set the color of the star */

}


        .product-details .buttons {
            margin-top: 40px; /* Add more margin-top to separate the buttons */
            
        }

        .product-details .buttons .add {
            padding: 10px 60px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            background-color: #2A2A72;
            width: 200px!important;
            
            
        }
        
    </style>

    <div class="product-container">
        <div class="product-card">
            <div class="product-image">
                <img src="<?php echo isset($product['ImageURL']) ? $product['ImageURL'] : ''; ?>">
            </div>
            <div class="product-details">
                <h1><?php echo isset($product['ProductName']) ? $product['ProductName'] : 'N/A'; ?></h1>
                <h2>$<?php echo isset($product['Price']) ? $product['Price'] : 'N/A'; ?></h2>
                <p class="desc"><?php echo isset($product['ProductDescription']) ? $product['ProductDescription'] : 'N/A'; ?></p>
                <div class="rating">
                    <?php
                    if (isset($product['Rating'])) {
                        $rating = $product['Rating'];
                        $wholeStars = floor($rating);
                        $decimalPart = $rating - $wholeStars;

                        // Display "Rating: " prefix
                                                echo "Rating: ";

                        // Display full stars
                        for ($i = 0; $i < $wholeStars; $i++) {
                            echo '<span class="star">★</span>';
                            
                        }
                        // Display half-star if applicable
                        if ($decimalPart >= 0.5) {
                            echo '<span class="star">★</span>';
                            
                        }
                        // Display empty stars
                        for ($i = 0; $i < 5 - ceil($rating); $i++) {
                            echo '<span class="star">☆</span>';
                            
                        }

                        // Display the rating value
                        echo " " . $rating;
                    } else {
                        echo "Rating: N/A";
                    }
                    ?>
                </div>
                <div class="buttons">
                    <a href="<?php echo isset($product['AmazonProductLink']) ? $product['AmazonProductLink'] : '#'; ?>" class="add">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Include the footer file
    include 'footer.php';
} else {
    echo "Product not found.";
}
?>

                       
