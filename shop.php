<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>ProTech-Shop</title>
  <link rel="stylesheet" href="shop.css">
  <script src="script.js"></script>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav>
  <div class="navbar">
    <div class="logo"><a href="#"><img src="PROTECH.png" alt="Protech Logo"></a></div>
    <div class="nav-links">
      <ul class="links">
        <li><a href="index.html">HOME</a></li>
        <li>
          <a href="shop.php">SHOP</a>
          <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
          <ul class="htmlCss-sub-menu sub-menu">
            <li><a href="shop.php?category=all">ALL PRODUCTS</a></li>
            <li><a href="shop.php?category=1">LAPTOPS</a></li>
            <li><a href="shop.php?category=2">DESKTOPS</a></li>
            <li><a href="shop.php?category=3">PRINTERS</a></li>
            <li><a href="shop.php?category=4">CAMERAS</a></li>
            <li><a href="shop.php?category=5">SECURITY CAMERAS</a></li>
          </ul>
        </li>
        <li><a href="about.php">ABOUT US</a></li>
        <li><a href="login.html"><span>LOG IN</span></a></li>
      </ul>
    </div>
    <div class="search-box">
      <i class='bx bx-search'></i>
      <div class="input-box">
        
        <!-- ADDED <FORM>...</FORM> around lines 41-42 clint -->
        <form action="fetch.php" method="GET">
          <input type="text" name="search" placeholder="SEARCH...">
        </form>
        
        
      </div>
    </div>
  </div>
</nav>

<div id="filtered-products">
  <div class="container">
            <ul class="cards">
                <?php
        // Include the simplified-card.php file for default display
        include 'simplified-card.php';
                ?>
            </ul>
            
        </div>
        
    </div>
    <!-- Footer PHP -->
  <?php
  include 'footer.php';
  ?>
    
</body>
</html>
