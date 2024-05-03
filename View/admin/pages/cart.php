<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    require('View/admin/layouts/navbar.php');
    // print_r($data)
    ?>

    <style>
        .input-group .form-outline {
            width: 80%;
        }

        #cart-list tbody tr:hover {
            cursor: pointer;
            background-color: #f0f0f0;
        }

        #myModal {
            width: 80vw;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1>Cart Management</h1>
        <div class="input-group">
            <div class="form-outline" data-mdb-input-init>
                <input type="search" id="form1" class="form-control" />
            </div>
        </div>
    </div>

    <table class="table" id="cart-list">
        <thead class="thead-dark">
            <tr>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container d-flex">
                        <div id="user-zone" class="mb-2"></div>
                        <div id="cart-summary"></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-zone">
                                        <!-- Table rows will be added dynamically here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary" id="submit">Submit</button> -->
                    </div>

                </div>
            </div>
        </div>


        <script>
            let cartData = [];

            // Get carts data
            const getCarts = () => {
                const dataSend = {
                    api: 'cartManagement',
                    action: 'getAllCarts'
                }
                $.post('APISelection.php', dataSend).done((data) => {
                    cartData = data.data;
                    displayCarts(cartData);
                    console.log(cartData);
                }).fail((response) => {
                    console.log(response);
                    window.alert("There was an error, check console for more information");
                })
            }

            // Display carts data
            const displayCarts = (data) => {
                if (data.length === 0) {
                    $("#cart-list thead tr").empty();
                    $("#cart-list tbody").empty();
                    return;
                }
                const keys = Object.keys(data[0]);

                $("#cart-list thead tr").empty();
                keys.forEach((key) => {
                    $("#cart-list thead tr").append(`<th>${key}</th>`);
                });

                $("#cart-list tbody").empty();
                data.forEach((cart) => {
                    console.log(cart);
                    const cartId = cart['CartID'] ? cart['CartID'] : '0';
                    let row = `<tr id=${cartId}>`;
                    keys.forEach((key) => {
                        row += `<td>${cart[key]}</td>`;
                    });
                    row += "</tr>";
                    $("tbody").append(row);
                });
            }

            $(document).ready(() => {
                getCarts();
            });

            const findCartInfo = (cartId) => {
                const dataSend = {
                    api: 'cartManagement',
                    action: 'getCartInfo',
                    cartId: cartId
                };
                $.post('APISelection.php', dataSend).done((data) => {
                    console.log(data);
                    renderCartInfo(data.data);
                }).fail((response) => {
                    console.log(response);
                    window.alert("There was an error, check console for more information");
                })
            }

            const renderCartInfo = (data) => {
                /* 
                Example Format of data:
                {
                    CardID: "1",
                    ExportDate: "2021-08-01",
                    UserInfo: {
                        AccessLevel: "1",
                        Avatar: "",
                        Name: "John Doe",
                        Password: "123",
                        Phoneno: "123-456-7890",
                        UserID: "1",
                        Username: "john"
                    },
                    Products: [
                        {
                            Amount: "4"
                            ProductInfo: {
                                Description: "This is a product",
                                Picture: "https://via.placeholder.com/150",
                                Name: "Product 1",
                                Price: "100",
                                ProductID: "1"
                            },
                        }
                    ]
                }
                */

                const isExported = data.ExportDate ? true : false;

                const productZone = $('#product-zone');
                const userZone = $('#user-zone');
                const cartSummary = $('#cart-summary');
                productZone.empty();
                userZone.empty();
                cartSummary.empty();

                // Render Product Info
                const products = data.Products;
                products.forEach((product) => {
                    const productInfo = product.ProductInfo;
                    const productDiv = `
                    <tr>
                        <td>${productInfo.Name}</td>
                        <td>$${productInfo.Price}</td>
                        <td>${product.Amount}</td>
                        <td>$${(productInfo.Price * product.Amount).toFixed(2)}</td>
                    </tr>
                `;
                    productZone.append(productDiv);
                });


                // Render User Info
                const userInfo = data.UserInfo;
                const userDiv = `
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">${userInfo.Name}</h5>
                        <p class="card-text">Username: ${userInfo.Username}</p>
                        <p class="card-text">Phone Number: ${userInfo.Phoneno}</p>
                        <p class="card-text">Access Level: ${userInfo.AccessLevel}</p>
                    </div>
                </div>
            `;
                userZone.append(userDiv);

                // Render Cart Summary
                const cartSummaryDiv = `
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <p class="card-text">Cart ID: ${data.CardID}</p>
                        <p class="card-text">Export Date: ${isExported ? data.ExportDate : 'Not Exported'}</p>
                        <p class="card-text">Total Price: $${products.reduce((acc, product) => acc + product.ProductInfo.Price * product.Amount, 0).toFixed(2)}</p>
                    </div>
                </div>
            `;

                cartSummary.append(cartSummaryDiv);
            }

            $(document).on('click', '#cart-list tbody tr', (e) => {
                const cartId = e.currentTarget.id;
                const cart = cartData.find((cart) => cart['CartID'] == cartId);
                $('#modal-title').text('Cart ' + cartId + ' Info');
                findCartInfo(cartId);
                $('#myModal').modal('show');
            });

            const searchInput = document.querySelector('input[type="search"]');
            searchInput.addEventListener("input", (e) => {
                const value = e.target.value;
                const filteredData = cartData.filter((cart) => {
                    const keys = Object.keys(cart);
                    for (let i = 0; i < keys.length; i++) {
                        if (cart[keys[i]]?.toString()?.toLowerCase()?.includes(value.toLowerCase())) {
                            return true;
                        }
                    }
                    return false;
                });
                displayCarts(filteredData);
            })
        </script>

</body>

</html>