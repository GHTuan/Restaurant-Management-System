<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 20px 0;
        }
        h1 {
            font-size: 36px;
        }
        .tabs {
            text-align: center;
            margin-top: 20px;
        }
        .tab {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ddd;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }
        .tab.active {
            background-color: #555;
            color: #fff;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .product {
            width: calc(25% - 20px);
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
        .product img {
            width: 40%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .product-info {
            width: 60%;
            margin: 0 auto;
        }
        .product-info h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .product-info p {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<?php
    require('View/user/layouts/navbar.php');
    // print_r($data);
?>

<body>
    <header>
        <h1>Menu</h1>
        <p>Welcome to our restaurant! Check out our delicious offerings below.</p>
    </header>
    <div class="tabs">
        <div class="tab active" data-category="all">All</div>
        <div class="tab" data-category="breakfast">Breakfast</div>
        <div class="tab" data-category="main-dish">Main Dish</div>
        <div class="tab" data-category="drinks">Drinks</div>
        <div class="tab" data-category="desserts">Desserts</div>
    </div>
    <div class="product-container">
        <!-- Product boxes will be dynamically generated here -->
    </div>

    <script>
        // Sample data for products
        const products = [
            { category: 'breakfast', image: 'breakfast.jpg', name: 'Pancakes', price: '$7.99', description: 'Fluffy pancakes served with maple syrup.' },
            { category: 'breakfast', image: 'omelette.jpg', name: 'Omelette', price: '$8.99', description: 'Freshly made omelette with a choice of fillings.' },
            { category: 'main-dish', image: 'steak.jpg', name: 'Steak', price: '$19.99', description: 'Juicy steak cooked to perfection.' },
            { category: 'main-dish', image: 'pasta.jpg', name: 'Pasta', price: '$12.99', description: 'Delicious pasta with a choice of sauces.' },
            { category: 'drinks', image: 'coffee.jpg', name: 'Coffee', price: '$2.49', description: 'Freshly brewed coffee.' },
            { category: 'drinks', image: 'cocktail.jpg', name: 'Cocktail', price: '$9.99', description: 'Signature cocktail made with premium ingredients.' },
            { category: 'desserts', image: 'cake.jpg', name: 'Cake', price: '$5.99', description: 'Decadent cake with assorted flavors.' },
            { category: 'desserts', image: 'icecream.jpg', name: 'Ice Cream', price: '$4.99', description: 'Creamy ice cream in various flavors.' }
        ];

        const productContainer = document.querySelector('.product-container');
        const tabs = document.querySelectorAll('.tab');

        // Function to filter products based on category
        function filterProducts(category) {
            productContainer.innerHTML = '';
            const filteredProducts = products.filter(product => category === 'all' || product.category === category);
            for (let i = 0; i < 8; i++) {
                const productBox = document.createElement('div');
                productBox.classList.add('product');
                if (filteredProducts[i]) {
                    const product = filteredProducts[i];
                    productBox.innerHTML = `
                        <img src="${product.image}" alt="${product.name}">
                        <div class="product-info">
                            <h3>${product.name}</h3>
                            <p>${product.price}</p>
                            <p>${product.description}</p>
                        </div>
                    `;
                } else {
                    // Placeholder for missing products
                    productBox.textContent = 'Missing Product';
                }
                productContainer.appendChild(productBox);
                // Add a line break after the fourth product
                if (i === 3) {
                    productContainer.appendChild(document.createElement('br'));
                }
            }
        }

        // Event listener for tab clicks
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const category = tab.dataset.category;
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                filterProducts(category);
            });
        });

        // Initially show all products
        filterProducts('all');
    </script>
</body>
</html>
<?php
    require ('View/user/layouts/footer.php');
?>
