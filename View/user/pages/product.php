<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Site</title>
</head>
<?php
    require ('View/user/layouts/navbar.php'); 
    // print_r($data)
?>
<body>

<style>
    /* CSS for layout */
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin: 0 10%; /* 10% margin on the left and right */
    }

    .bold {
        font-weight: bold; /* Make the "UP" text bold */
    }

    .header {
        height: 20%;
        background-color: #ccc;
        text-align: center;
        line-height: 2;
        margin-bottom: 20px; /* Add margin at the bottom */
    }

    .header-line {
        line-height: 1.2; /* Adjust line height for better spacing */
    }

    .content {
        height: 50%;
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }

    .additional-info {
        height: 10%;
        background-color: #f0f0f0;
        padding: 10px;
    }

    .footer {
        height: 10%;
        background-color: #ddd; /* Changed color for distinction */
        text-align: center;
        line-height: 2;
    }

    .column {
        margin-right: 5px; /* 5px margin between columns */
        display: flex;
        flex-direction: column;
    }

    .product-button {
        cursor: pointer; /* Change cursor to pointer on hover */
        margin-bottom: 5px; /* Add some space between buttons */
        transition: transform 0.3s ease; /* Add transition effect */
    }

    .product-button:hover {
        transform: scale(1.1); /* Increase size on hover */
    }

    .product-button img {
        max-width: 100%;
        height: auto;
        display: block;
        margin-bottom: 5px; /* Add some space between images */
    }

    .product img {
        width: 100%; /* Fill the entire width of the column */
        height: 100%; /* Fill the entire height of the column */
        object-fit: cover; /* Maintain aspect ratio */
        display: none; /* Initially hide all product images */
    }

    .product img.active {
        display: block; /* Show active product image */
    }

    .product-description {
        padding: 5px;
    }

    .product-description h4 {
        margin-top: 0;
    }

    .column:first-child .product {
        height: 8%; 
    }

    .column:nth-child(2), .column:nth-child(3) {
        width: 45%; /* The remaining space is equally divided */
        height: 100%; /* Fill the entire height of the column */
    }

    .product button {
        width: 250px; /* Set the width of the button */
        height: 40px; /* Set the height of the button */
        font-size: 18px; /* Increase the font size of the button text */
        display: block; /* Ensure the button takes up full width */
        margin: auto; /* Center the button horizontally */
    }

    .spacer {
        height: 5px; /* Add spacing of 5px */
    }

    .footer {
        text-align: center; /* Center align the content */
        margin-top: 10px; /* Add space between additional info and footer */
    }

    .links {
        margin-top: 10px; /* Add some space above the links */
        text-align: center; /* Center align the content */
    }

    .links a {
        margin: 0 5px; /* Add some spacing between the links */
    }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-line">CHEER<span class="bold">UP</span></div>
        <div class="header-line">modern personal log theme</div>
    </div>

    <div class="content">
        <div class="column">
            <!-- Column 1: Image buttons for different products -->
            <div class="product-button" onclick="showProduct('product1.jpg')">
                <img src="https://via.placeholder.com/75" alt="Product 1">
            </div>
            <div class="product-button" onclick="showProduct('product2.jpg')">
                <img src="https://via.placeholder.com/75" alt="Product 2">
            </div>
            <div class="product-button" onclick="showProduct('product3.jpg')">
                <img src="https://via.placeholder.com/75" alt="Product 3">
            </div>
            <div class="product-button" onclick="showProduct('product4.jpg')">
                <img src="https://via.placeholder.com/75" alt="Product 4">
            </div>
        </div>
        <!-- Column 2: Image of current page -->
        <div class="column">
            <div class="product img">
                <img id="productImage" src="https://via.placeholder.com/150" alt="Product">
            </div>
        </div>
        <!-- Column 3: Description and buy now button -->
        <div class="column">
            <div class="product">
                <h3>Product Description</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <button>Buy Now</button>
            </div>
        </div>
    </div>

    <div class="additional-info"> 
        <div class="links">
            <a href="#">Description</a> | 
            <a href="#">Additional Information</a> | 
            <a href="#">Review (5)</a>
        </div>
    </div>
    <div class="footer">
        Additional information
    </div>
</div>

<script>
    function showProduct(imageUrl) {
        var productImage = document.getElementById('productImage');
        productImage.src = imageUrl;
        productImage.classList.add('active'); // Add the 'active' class to show the image
    }
</script>

</body>
</html>
<?php
    require ('View/user/layouts/footer.php'); 
?>