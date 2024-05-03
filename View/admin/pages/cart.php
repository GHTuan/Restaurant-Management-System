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
        .input-group .form-outline{
            width: 80%;
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

    <table class="table">
        <thead class="thead-dark">
            <tr>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit-form">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submit">Submit</button>
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
                $("thead tr").empty();
                $("tbody").empty();
                return;
            }
            const keys = Object.keys(data[0]);
            
            $("thead tr").empty();
            keys.forEach((key) => {
                $("thead tr").append(`<th>${key}</th>`);
            });
            
            $("tbody").empty();
            data.forEach((cart) => {
                let row = "<tr>";
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