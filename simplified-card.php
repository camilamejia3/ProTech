<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simplified Product Card</title>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
    <style>
      body {
  color: #999999;
  font-family: 'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
  padding: 1rem;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -moz-font-feature-settings: "liga" on;
  background-color: #f0f0f0;
  padding-top: 100px;
  margin: 0;
}

img {
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}

.btn {
  background-color: black;
  border: 1px solid #cccccc;
  color: white;
  padding: 0.5rem;
  text-transform: uppercase;
   transition: all 0.3s ease;
}
.btn:hover {
  background-color: #F6F4F1; /* Set the background color on hover */
  color: black; /* Set the text color on hover */
}

.btn--block {
  display: block;
  width: 100%;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
  justify-content: flex-start;
}

.cards__item {
  display: flex;
  flex-direction: column;
  width: calc(33.3333% - 1rem);
  box-sizing: border-box;
  margin-bottom: 1.8rem;
  padding: 2.5rem;
}

@media (max-width: 768px) {
  .cards__item {
    width: calc(50% - 2rem);
  }
}

@media (max-width: 576px) {
  .cards__item {
    width: calc(100% - 2rem);
  }
}

.card {
  background-color:white;
  border:none;
  box-shadow: none;
  display: flex;
  flex-direction: column;
  overflow: hidden;
  &:hover {
    .card__image {
      filter: contrast(100%);
    }
  }
}

.card__content {
    height: 240px; /* Set the height of the container to 4 inches */
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 1rem;
  }

.card__image {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  filter: contrast(100%);
  overflow: hidden;
  position: relative;
  transition: transform 0.3s ease-in-out; /* Add a new transition property */
  transform-origin: center center;
  &::before {
    content: "";
    display: block;
    padding-top: 80%; /* 16:9 aspect ratio */
  } 

  @media (min-width: 40rem) {
    &::before {
      padding-top: 66.6%; /* 3:2 aspect ratio */
    }
  }
}
.card:hover .card__image {
  transform: scale(1.1); /* Apply a scale transform on hover */
}

.card__title {
  color:#333333;
  font-size: 1.5rem;
  font-weight: 300;
  letter-spacing: 2px;
  text-transform: uppercase;
  flex-shrink: 0;
  margin-bottom: 0.5rem;
  padding-top: 0.62rem;
}
.card__title {
    flex-grow: 1;
    margin-bottom: 0;
  }
  
.card__price {
    margin-top: 0;
    font-size:1.25rem;
    padding-bottom: 1rem;
    color: #424949;
  }

.card__text {
  flex: 1 1 auto;
  font-size: 1.125rem;
  line-height: 1.5;
  margin-bottom: 1.25rem;
}

.content {
    margin-left: 1in;
  margin-right: 1in;
    }
    
h2.category-name {
    font-size: 2rem; /* Adjust the font size as desired */
    margin-bottom: 30px; /* Adjust the margin bottom as desired */
    text-align: left; /* Adjust the text alignment as desired */
    font-family: 'Poppins', sans-serif; /* Use the Poppins font */
    color: #333333; /* Use the same color as the product name */
    font-weight: 400; /* Use the same font weight as the product name */
    letter-spacing: 2px; /* Use the same letter spacing as the product name */
    text-transform: uppercase; /* Use the same text transformation as the product name */
    margin-left: 0.5in; /* Add margin on the left side */
    
  }
  
.product-count {
    font-size: 16px;
    color: #333333;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
    display: inline-block;
    margin-left: 0.5in;
    padding-right: 1inch;
}

.sort-by {
    display: inline-block;
    text-align: right;
    font-size: 16px;
    color: #333333;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
    margin-right: 1in;
    padding-left: 7.5in;
}

.sort-by select {
            padding: 5px;
            position: relative;
            text-transform: uppercase;
        }

        .sort-by select::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 10px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 6px 6px 0 6px;
            border-color: #999999 transparent transparent transparent;
            transition: transform 0.3s ease;
            transform-origin: center center;
        }

        .sort-by select:hover::after {
            transform: rotate(180deg);
        }
#filtered-products {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
}
    </style>
</head>
<body>
    <div class="container">
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
    $category = $_GET['category'] ?? 'all';
    $sort = $_GET['sort'] ?? '';

    $query = "SELECT * FROM products";

    if ($category !== 'all') {
        $query .= " WHERE CategoryID = $category";
    }

    // Modify the query based on the sorting parameter
    if ($sort === 'low_to_high') {
        $query .= " ORDER BY Price ASC";
    } elseif ($sort === 'high_to_low') {
        $query .= " ORDER BY Price DESC";
    }

    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Retrieve the product data
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Fetch the category name and count the products
        $categoryID = $_GET['category'] ?? 'all';
        $categoryName = '';
        $productCount = count($products);

        if ($categoryID !== 'all') {
            $categoryQuery = "SELECT Name FROM Category WHERE CategoryID = $categoryID";
            $categoryResult = mysqli_query($conn, $categoryQuery);

            if ($categoryResult) {
                $categoryData = mysqli_fetch_assoc($categoryResult);
                $categoryName = $categoryData['Name'];
            } else {
                echo "Error retrieving the category name: " . mysqli_error($conn);
            }
        } else {
            // Set the category name to "ALL PRODUCTS" for 'all' category
            $categoryName = "ALL PRODUCTS";
        }

        // Display the category name and product count
        echo '<div class="content">';
        echo '<h2 class="category-name">' . strtoupper($categoryName) . '</h2>';
        echo '<p class="product-count">Products (' . $productCount . ')</p>';

        // Display the sort by option
        echo '<div class="sort-by">';
        echo '<select onchange="location = this.value;">';
        echo '<option value="">Sort By</option>';
        echo '<option value="' . $_SERVER['PHP_SELF'] . '?category=' . $category . '&sort=low_to_high">Price Low to High</option>';
        echo '<option value="' . $_SERVER['PHP_SELF'] . '?category=' . $category . '&sort=high_to_low">Price High to Low</option>';
        echo '</select>';
        echo '</div>';

        // Output the product cards
        echo '<ul class="cards">';
        foreach ($products as $product) {
            echo '<li class="cards__item">';
            echo '<div class="card" onclick="window.location.href=\'detailed_product.php?id=' . $product['id'] . '\'">';
            echo '<div class="card__image" style="background-image: url(\'' . $product['ImageURL'] . '\');"></div>';
            echo '<div class="card__content">';
            echo '<div class="card__title">' . $product['ProductName'] . '</div>';
            echo '<p class="card__price">$' . number_format($product['Price'], 2, '.', ',') . '</p>';

            echo '<button class="btn btn--block card__btn" onclick="event.stopPropagation(); window.location.href=\'' . $product['AmazonProductLink'] . '\'">Shop Now</button>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>'; // Closing tag for cards
        echo '</div>'; // Closing tag for content

        // Free the result set
        mysqli_free_result($result);
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div> <!-- Closing tag for container -->
</body>
</html>
