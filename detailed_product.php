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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">

    <style>
        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 1.5in;
            margin-right: 1.5in;
            padding-top: 20px;
            
        }

        .product-card {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            border: none;
        }

        .product-image {
            margin-right: 40px;
            justify-content: center; /* Center items horizontally */
            align-items: center; 
            margin-top:40px;
        }

        .product-image img {
            max-width: 480px; /* Set a maximum width of 100% */
            max-height: 480px; /* Set a maximum height of 480px */
            height: auto; /* Allow the image to adjust its height while maintaining aspect ratio */
        }

        .product-details {
            font-family:'Poppins', sans-serif;
            padding-top: 10px; /* Add padding to separate the rating from the product description */
            font-size: 18px;
            padding-left:30px;
            color: #333333;
        
        }
         

        .product-details h1 {
            font-size: 50px;
            margin-top: 0;
            font-family:'Poppins', sans-serif;
            color: #333333;
            letter-spacing: 1px;
            margin-bottom:10px;
        }

        .product-details h2 {
            font-size: 26px;
            margin-top: 15px;
            color: #333333;
            padding-bottom: 20px;
        }

        .product-details .desc {
            margin-top: 10px;
        }

        .product-details .rating {
            margin-top: 30px;
            font-size: 20px; /* Increase the font size for the rating */
            text-transform: uppercase;
            display: inline-block; /* Display the rating inline */
           position: relative; /* Add relative positioning */
           color: #333333;
        }
        .product-details .rating::after {
        content: "";
        position: absolute;
        bottom: -5px; /* Adjust the distance of the line from the rating */
        left: 0;
        width: 580px; /* Use the full width of the text container */
        height: 1px;
        background-color: black; /* Adjust the color of the line */

            
}

        .product-details .rating .star {
            display: inline-block;
            margin-right: 2px;
            font-size: 20px;
            color: #FDCC0D;
            border-radius: 50%; /* Make the star icons round */
            background-color: transparent; /* Remove the background color */
        }

        .product-details .buttons {
            margin-top: 40px; /* Add more margin-top to separate the buttons */
            display: inline-block;
        }

        .product-details .buttons .add {
            padding: 20px 0; /* Adjust the padding as desired */
            background-color: black;
            color: white;
            text-transform: uppercase;
            letter-spacing: 3px;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1;
            transition: background-color 0.3s ease;
            width: 600px;;
            text-decoration: none;
        }

        .product-details .buttons .add:hover {
            background-color: #F6F4F1;
            color: black;
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
            <div class="buttons">
                <a href="<?php echo isset($product['AmazonProductLink']) ? $product['AmazonProductLink'] : '#'; ?>" class="add">Buy Now</a>
            </div>
            <div class="rating">
                <span class="rating-label">RATINGS : </span>
                <?php
                if (isset($product['Rating'])) {
                    $rating = $product['Rating'];
                    $wholeStars = floor($rating);
                    $decimalPart = $rating - $wholeStars;

                    // Display full stars
                    for ($i = 0; $i < $wholeStars; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }

                    // Display half-star if applicable
                    if ($decimalPart >= 0.5) {
                        echo '<i class="fas fa-star-half-alt"></i>';
                    }

                    // Display empty stars
                    for ($i = 0; $i < 5 - ceil($rating); $i++) {
                        echo '<i class="far fa-star"></i>';
                    }

                    // Display rating value
                    echo ' (' . $rating . ')';
                } else {
                    echo "Rating: N/A";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Similar Products Section -->
<?php
// Include the similar-products.php file after the product details section
include 'similar-products.php';

// Include the footer file
include 'footer.php';
} else {
    echo "Product not found.";
}
?>

