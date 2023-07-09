<?php
// Include the database connection file (database.php)
include 'database.php';

// Fetch the similar products from the database based on category
$currentProductId = $product['id'];
$currentCategoryId = $product['CategoryId'];

// Query to fetch similar products
$sql = "SELECT * FROM products WHERE CategoryId = $currentCategoryId AND id != $currentProductId LIMIT 4";
$result = $conn->query($sql);

// Check if similar products were found
if ($result && $result->num_rows > 0) {
    $similarProducts = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Content -->
<div class="similar-products-section">
    <h2>Similar Products</h2>
    <ul class="cards">
        <?php foreach ($similarProducts as $similarProduct) { ?>
            <li class="cards__item">
                <div class="card" onclick="window.location.href='detailed_product.php?id=<?php echo isset($similarProduct['id']) ? $similarProduct['id'] : ''; ?>'">
                    <div class="card__image" style="background-image: url('<?php echo isset($similarProduct['ImageURL']) ? $similarProduct['ImageURL'] : ''; ?>');"></div>
                    <div class="card__content">
                        <div class="card__title"><?php echo isset($similarProduct['ProductName']) ? $similarProduct['ProductName'] : 'N/A'; ?></div>
                        <p class="card__price">$<?php echo isset($similarProduct['Price']) ? number_format($similarProduct['Price'], 2, '.', ',') : 'N/A'; ?></p>
                        <button class="btn btn--block card__btn" onclick="event.stopPropagation(); window.location.href='<?php echo isset($similarProduct['AmazonProductLink']) ? $similarProduct['AmazonProductLink'] : '#'; ?>'">Shop Now</button>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
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
    width: 25%;
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
    border: 1px solid #cccccc; 
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
  .cards {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    margin: 0;
    padding: 0;
    justify-content: space-between;
    margin-left: -1rem; /* Add negative margin to offset the container spacing */
    margin-right: -1rem; /* Add negative margin to offset the container spacing */
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
    font-size: 1.3rem;
    font-weight: 300;
    letter-spacing: 2px;
    text-transform: uppercase;
    flex-shrink: 0;
    margin-bottom: 0.5rem;
    padding-top: 0.70rem;
  }
  .card__title {
    flex-grow: 1;
    margin-bottom: 0;
  }
  
  .card__price {
    margin-top: 0;
    font-size: 1.25rem;
    padding-bottom: 1rem;
    color: #424949;
  }

  .card__text {
    flex: 1 1 auto;
    font-size: 1.125rem;
    line-height: 1.5;
    margin-bottom: 1.25rem;
  }
  .similar-products-section h2 {
    font-size: 24px; /* Adjust the font size as desired */
    color: #333333; /* Adjust the color as desired */
    padding-left:30px;
    text-transform:uppercase;
    letter-spacing:2px;
    padding-top:30px;
}
</style>

<?php
} else {
    // Handle the case when no similar products are found
    echo "No similar products found.";
}
?>
