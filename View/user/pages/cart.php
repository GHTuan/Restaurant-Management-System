<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cart</title>
    <style>
        main {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<?php
require('View/user/layouts/navbar2.php');
?>

<body>
    <main class="container">
        <h1>Cart</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </main>
    <script>
        const changeQuantity = (productID, quantity, CartID) => {
            $.post('CartAPI.php', {
                action: 'update',
                productID: productID,
                amount: quantity,
                cartId: CartID
            }).done((response) => {
                showCartItem(response.cartItems);
            });
        }

        const showCartItem = (cartItems) => {
            /*
            cartItems example:
            [
                {
                    Product: {
                        "ProductID": "1",
                        "Name": "Pizza",
                        "Price": "12.99",
                        "Description": "Delicious pepperoni pizza with mozzarella cheese and tomato sauce.",
                        "Type": "Food",
                        "Picture": null
                    },
                    CartID: 1,
                    Amount: 2
                },
                other items...
            ]
            */
            let tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            cartItems.forEach((item) => {
                let tr = document.createElement('tr');

                // First Column: Product
                let tdProduct = document.createElement('td');
                let tdPicture = document.createElement('img'); // Image element
                tdPicture.src = item.Product.Picture;
                tdPicture.width = 100;
                tdProduct.appendChild(tdPicture); // Add image to tdProduct
                let tdName = document.createElement('span'); // Span element for product name
                tdName.innerText = item.Product.Name;
                tdProduct.appendChild(tdName); // Add product name to tdProduct
                tr.appendChild(tdProduct);

                // Second Column: Price
                let tdPrice = document.createElement('td');
                tdPrice.innerText = "$" + item.Product.Price;
                tr.appendChild(tdPrice);

                // Third Column: Quantity
                let tdQuantity = document.createElement('td');
                // Create a button to increase or decrease the quantity
                let btnDecrease = document.createElement('button');
                btnDecrease.innerText = '-';
                btnDecrease.addEventListener('click', () => {
                    changeQuantity(item.Product.ProductID, Number(item.Amount) - 1, item.CartID);
                });
                tdQuantity.appendChild(btnDecrease);
                let spanQuantity = document.createElement('span');
                spanQuantity.innerText = item.Amount;
                tdQuantity.appendChild(spanQuantity);
                let btnIncrease = document.createElement('button');
                btnIncrease.innerText = '+';
                btnIncrease.addEventListener('click', () => {
                    changeQuantity(item.Product.ProductID, Number(item.Amount) + 1, item.CartID);
                });
                tdQuantity.appendChild(btnIncrease);
                tr.appendChild(tdQuantity);

                // Fourth Column: Subtotal
                let tdSubtotal = document.createElement('td');
                tdSubtotal.innerText = "$" + (item.Product.Price * item.Amount).toFixed(2);
                tr.appendChild(tdSubtotal);

                tbody.appendChild(tr);
            });
        }

        $(document).ready(function() {
            $.post('CartAPI.php', {
                action: 'load'
            }).done((response) => {
                if (response.cartItems) {
                    showCartItem(response.cartItems);
                }
            });
        });
    </script>
</body>

</html>
<?php
require('View/user/layouts/footer.php');
?>