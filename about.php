<!-- about.php -->

<?php
// Include the header file
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>ABout Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@100;200&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333333;
            margin: 0;
            padding-bottom:0;
        }

        section div:first-of-type {
            position: relative;
        }

        section div:first-of-type img {
            width: 100vw;
            height: 550px;
            object-fit: cover;
            margin-left: calc(-50vw + 50%);
        }

        section div:first-of-type h1 {
            position: absolute;
            top: 20%;
            left: 0;
            transform: translate(0, -50%);
            color: #333333;
            font-size: 28px;
            text-align: right;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding-left: 760px;
        }
         section div:first-of-type > div > p {
        padding: 0 96px; /* Add padding on the right and left sides */
        font-size:18px;
    }

        section div:first-of-type > div > h2 {
            position: absolute;
            bottom: 180px;
            left: 10px;
            color: #333333;
            font-size: 28px;
            text-align: left;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
        }

        section div:first-of-type > div > h3 {
            margin-top: 30px;
            margin-bottom: 30px;
            text-align: center;
            font-size: 26px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

         section div:nth-of-type(2) {
        display: flex;
        align-items: flex-start;
        margin-top: 50px;
        padding: 0 96px;
        padding-bottom:30px;
        background-color:#D3D3D3;
    }

    section div:nth-of-type(2) h4 {
        flex: 1;
        color: #333333;
        font-size: 26px;
        text-transform: uppercase;
        margin-right: 20px;
        margin-bottom: 10px; /* Add this line to remove the default bottom margin */
        padding-top:30px;
        letter-spacing: 2px;
    }

     section div:nth-of-type(2) .image-container {
            max-width: 800px;
            max-height:600px;
            margin-top: 70px;
        }
        section div:nth-of-type(2) img {
            width: 100%;
            height: auto;
        }
        
        .shopping-experience {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 96px;
        background-color: #D3D3D3;
    }

    .shopping-experience > div {
        flex: 1;
    }

    .buy-image-container img {
        width: 100%;
        height: auto;
        max-width: 500px; /* Adjust the maximum width as needed */
        max-width:500px;
        margin-top:40px;
        background-color: transparent!important;
    }
    .shopping-experience h4 {
        font-size: 28px;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding-bottom:30px;
    }
        
        section p {
        font-size: 18px; /* Updated font size */
        margin-bottom:10px;
    }

      
    </style>
    <!-- Include your other CSS and head elements -->
</head>
<body>
<!-- About Us Content -->
<<section>
    <div>
        <img src="inov.jpg" alt="Technology and Innovation Image">
        <h1>Embrace the Future with ProTech</h1>
        <div>
            <h2>Where Technology Meets Possibility</h2>
            <h3>About Us</h3>
            <p>At ProTech, we believe in embracing the future and unlocking the endless possibilities that technology offers. With our curated selection of cutting-edge tech products, we are here to inspire and empower you to stay ahead in the digital age.</p>
        </div>
    </div>

    <div>
        <div>
            <h4>Discover the Next Generation of Tech</h4>
            <p>Our handpicked collection showcases the latest advancements and breakthroughs in the world of technology. We have everything you need to experience the future today.</p>
            <h4>Expert Recommendations</h4>
            <p>Our team of tech enthusiasts and experts scours the market to bring you the most innovative and reliable products. We thoroughly evaluate each item to ensure it meets our high standards of quality and performance. Rest assured, our recommendations are completely unbiased, helping you make informed decisions with confidence.</p>
        </div>
        <div class="image-container">
            <img src="gen.jpg" alt="Recommendations Image">
        </div>
    </div>
<div class="shopping-experience">
        <div>
            <h4>Seamless Shopping Experience</h4>
            <p>ProTech is your gateway to the tech world. With a simple click, you'll be redirected to the respective links, where you can make your purchase securely and conveniently. Enjoy a seamless shopping experience as you explore our website and find the tech products that match your unique needs.</p>
        </div>
        <div class="buy-image-container">
            <img src="buy.jpg" alt="Discover the Next Generation of Tech Image">
        </div>
    </div>
</section>
<?php
// Include the footer file
include 'footer.php';
?>
