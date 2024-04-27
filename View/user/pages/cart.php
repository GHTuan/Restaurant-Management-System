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
        #subtotal {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    </style>
</head>
<?php
require('View/user/layouts/navbar2.php');
?>

<body>
    <main class="container-fluid">
        <div class="row">
            <div class="container col-lg-8">
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
        
                <button><i class="fa-solid fa-arrow-left"></i> Continue Shopping</button>
                <button><i class="fa-solid fa-trash"></i> Clear Cart</button>
            </div>
            <div class="container col-lg-4">
                <h2>Order Summary</h2>
                <div id="subtotal">
                    <h4>Subtotal:</h4>
                    <span id="subtotal-price">$0.00</span>
                </div>
                <hr>
                <h4>Shipping:</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="shipping1" value="0" checked>
                    <label class="form-check-label" for="shipping1">
                        Flat rate
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="shipping2" value="5">
                    <label class="form-check-label" for="shipping2">
                        Free Shipping
                    </label>
                </div>
                <hr>
                <h4>Total:</h4>
                <span id="total-price">$0.00</span>
                <br>
                <button><i class="fa-solid fa-credit-card"></i> Proceed to Checkout</button>
            </div>
        </div>
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
            let subtotalPrice = document.getElementById('subtotal-price');
            let totalPrice = document.getElementById('total-price');

            let subtotal = 0;
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
                subtotal += item.Product.Price * item.Amount;
                tr.appendChild(tdSubtotal);

                tbody.appendChild(tr);
            });
            subtotalPrice.innerText = "$" + subtotal.toFixed(2);
            totalPrice.innerText = "$" + (subtotal + Number(document.querySelector('input[name="shipping"]:checked').value)).toFixed(2);
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
// require('View/user/layouts/footer.php');
?>