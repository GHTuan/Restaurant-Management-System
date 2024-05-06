<?php
$productPerPage = 4;
$pageMax = ceil(count($data) / $productPerPage);
if (!isset($_GET['page'])) $page = 1;
else {
    $page = $_GET['page'];
    if ($page > $pageMax) $page = $pageMax;
}
$beginProductIndex = $productPerPage * ($page - 1);
$endProductIndex = min($productPerPage * $page, count($data)) - 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/unorm@1.6.0/lib/unorm.min.js"></script>

<?php
require('View/admin/layouts/navbar.php');
//print_r($data)
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif
}

body {
    background-color: bisque
}

.container {
    margin: 30px auto
}

/* .navbar-nav .nav-link {
    color: #000 !important;
    padding: 0.5rem 0rem !important;
    border-color: transparent;
    margin-left: 1.5rem;
    transition: none
}

.navbar .navbar-toggler:focus {
    box-shadow: none
}

.navbar-nav .nav-link.active,
.border-red {
    border-bottom: 3px solid #b71c1c
}

.navbar-nav .nav-link:hover {
    border-bottom: 3px solid #b71c1c
} */

.container .product-item {
    min-height: 450px;
    border: none;
    overflow: hidden;
    position: relative;
    border-radius: 0
}

.container .product-item .product {
    width: 100%;
    height: 350px;
    position: relative;
    overflow: hidden;
    cursor: pointer
}

.container .product-item .product img {
    width: 100%;
    height: 100%;
    object-fit: cover
}

.container .product-item .product .icons .icon {
    width: 40px;
    height: 40px;
    background-color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.6s ease;
    transform: rotate(180deg);
    cursor: pointer
}

.container .product-item .product .icons .icon:hover {
    background-color: #b71c1c;
    color: #fff
}

.container .product-item .product .icons .icon:nth-last-of-type(3) {
    transition-delay: 0.2s
}

.container .product-item .product .icons .icon:nth-last-of-type(2) {
    transition-delay: 0.15s
}

.container .product-item .product .icons .icon:nth-last-of-type(1) {
    transition-delay: 0.1s
}

.container .product-item:hover .product .icons .icon {
    transform: translateY(-60px)
}

.container .product-item .tag {
    text-transform: uppercase;
    font-size: 0.75rem;
    font-weight: 500;
    position: absolute;
    top: 10px;
    left: 20px;
    padding: 0 0.4rem
}

.container .product-item .title {
    font-size: 0.95rem;
    letter-spacing: 0.5px
}

.container .product-item .fa-star {
    font-size: 0.65rem;
    color: goldenrod
}

.container .product-item .price {
    margin-top: 10px;
    margin-bottom: 10px;
    font-weight: 600
}

.fw-800 {
    font-weight: 800
}

.bg-green {
    background-color: #208f20 !important;
    color: #fff
}

.bg-black {
    background-color: #1f1d1d;
    color: #fff
}

.bg-red {
    background-color: #bb3535;
    color: #fff
}

#editFormContainer {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
    z-index: 1000; /* Đảm bảo form hiển thị trên cùng của tất cả các phần tử khác */
}

#addFormContainer {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
    z-index: 1000; /* Đảm bảo form hiển thị trên cùng của tất cả các phần tử khác */
}

/* @media (max-width: 767.5px) {

    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
        background-color: #b71c1c;
        color: #fff !important
    }

    .navbar-nav .nav-link {
        border: 3px solid transparent;
        margin: 0.8rem 0;
        display: flex;
        border-radius: 10px;
        justify-content: center
    }
} */
</style>
</head>
<body>
    <!-- <h1>Product Page For Admin</h1> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<div class="container bg-white">
<nav class="navbar navbar-expand-md navbar-light bg-white justify-content-center">
    <div class="container-fluid"> 
        <button id="new-product-btn" class="navbar-brand text-uppercase fw-800 btn btn-primary" type="button" class="btn" onclick="populateAddForm()"> Add New Product</button>
            <button id="nav-toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
        <div class="collapse navbar-collapse justify-content-center" id="myNav">
            <div class="navbar-nav"> 
            <a id="Tất cả" class="nav-link active fs-5" aria-current="page" href="#">Tất cả</a> 
            <a id="Cơm" class="nav-link fs-5" href="#">Cơm</a> 
            <a id="Bún" class="nav-link fs-5" href="#">Bún</a> 
            <a id="Lẩu" class="nav-link fs-5" href="#">Lẩu</a> 
            <a id="Nước" class="nav-link fs-5" href="#">Nước uống</a>
                <!-- Add the search form -->
            </div>
        </div>
        <form class="d-flex ms-3">
            <div class="col">
                <input class="form-control border border-2" type="search" placeholder="Nhập ..." aria-label="Search">
            </div>
            <!-- <button class="btn btn-outline-success" type="submit">Tìm kiếm</button> -->
        </form>
    </div>
</nav>
<div class="row">
    <?php for ($i = $beginProductIndex; $i <= $endProductIndex; $i++) { ?>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product">
                <img src="<?php echo $data[$i]['Picture']; ?>" alt="<?php echo $data[$i]['Name']; ?>">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                <li class="icon mx-3">
                    <button class="edit-btn" onclick="populateEditForm(<?php echo ($data[$i]['ProductID']); ?>, '<?php echo ($data[$i]['Name']); ?>', '<?php echo ($data[$i]['Type']); ?>', '<?php echo ($data[$i]['Price']); ?>', '<?php echo ($data[$i]['Description']); ?>', '<?php echo ($data[$i]['Picture']); ?>')">
                        <span class="fas fa-edit"></span>
                    </button>
                </li>
                <li class="icon mx-3">
                    <form action="index.php?controller=Product&action=deleteProduct" method="POST">
                        <input type="hidden" name="productId" value="<?php echo $data[$i]['ProductID']; ?>">
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');">
                            <span class="fas fa-trash-alt"></span>
                        </button>
                    </form>
                </li>
                </ul>
            </div>
            <?php if(isset($data[$i]['Tag']) && !empty($data[$i]['Tag'])) { ?>
                <div class="tag bg-<?php echo $data[$i]['Tag']['Color']; ?>"><?php echo $data[$i]['Tag']['Text']; ?></div>
            <?php } ?>
            <div class="title pt-4 pb-1 fs-5"><?php echo $data[$i]['Name']; ?></div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5"><?php echo $data[$i]['Price']; ?> VND</div>
        </div>
    <?php } ?>
</div>

<div id="editFormContainer" class="container" style="display: none;">
    <form action="index.php?controller=product&action=updateProduct" method="POST">
            <div class="form-group">
                <label for="editProductId">Product ID:</label>
                <input type="text" class="form-control" id="editProductId" name="productId" readonly required>
            </div>
            <div class="form-group">
                <label for="editProductName">Product Name:</label>
                <input type="text" class="form-control" id="editProductName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="editProductName">Product Type:</label>
                <input type="text" class="form-control" id="editProductType" name="productType"  required>
            </div>
            <div class="form-group">
                <label for="editProductPrice">Product Price:</label>
                <input type="number" class="form-control" id="editProductPrice" name="productPrice" required>
            </div>
            <div class="form-group">
                <label for="editProductDescription">Product Description:</label>
                <input type="text" class="form-control" id="editProductDescription" name="productDescription"  required>
            </div>
            <div class="form-group">
                <label for="editProductImageURL">Product Image URL:</label>
                <input type="text" class="form-control" id="editProductImageURL" name="productImageURL" required>
            </div>
        <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
        <button type="button" class="btn btn-danger ml-2 mt-2" onclick="cancelEdit()">Cancel</button>
    </form>
</div>

<div id="addFormContainer" class="container" style="display: none;">
    <form action="index.php?controller=product&action=addProduct" method="POST">
                <div class="form-group">
                    <label for="addProductName">Product Name:</label>
                    <input type="text" class="form-control" id="addProductName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="addProductName">Product Type:</label>
                    <input type="text" class="form-control" id="addProductType" name="productType" required>
                </div>
                <div class="form-group">
                    <label for="addProductPrice">Product Price:</label>
                    <input type="number" class="form-control" id="addProductPrice" name="productPrice" required>
                </div>
                <div class="form-group">
                    <label for="addProductDescription">Product Description:</label>
                    <input type="text" class="form-control" id="addProductDescription" name="productDescription" required>
                </div>
                <div class="form-group">
                    <label for="addProductImageURL">Product Image URL:</label>
                    <input type="text" class="form-control" id="addProductImageURL" name="productImageURL" required>
                </div>
            <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
            <button type="button" class="btn btn-danger ml-2 mt-2" onclick="cancelAdd()">Cancel</button>
    </form>
</div>

<nav aria-label="Page navigation" class="pb-2">
            <ul class="pagination justify-content-center mt-4">
                <?php
                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?controller=product&page=' . ($page - 1) . '">Previous</a></li>';
                } else {
                    echo '<li class="page-item disabled" style="cursor: not-allowed"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>';
                }
                for ($i = 1; $i <= min($pageMax, 3); $i++)
                {
                    // Range: ($i, $pageMax - 3 + $i)
                    $pageNum = $page - 2 + $i;
                    $pageNum = max($i, $pageNum);
                    $pageNum = min($pageNum, $pageMax - 3 + $i);
                    $isActive = $pageNum == $page ? 'active' : '';
                    echo '<li class="page-item '.$isActive.'"><a class="page-link" href="?controller=product&page=' . $pageNum . '">' . $pageNum . '</a></li>';

                }
                if ($page < $pageMax) {
                    echo '<li class="page-item"><a class="page-link" href="?controller=product&page=' . ($page + 1) . '">Next</a></li>';
                } else {
                    echo '<li class="page-item disabled" style="cursor: not-allowed;"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a></li>';
                }
                ?>
            </ul>
        </nav>

</div>
<script>
    // filter feature
    document.querySelectorAll('.nav-link').forEach(item => {
        item.addEventListener('click', function() {
        const type = this.id;
        console.log('Sorting by: ' + type);

        let filteredProducts;
        if (type === 'Tất cả') {
            // If 'Tất cả' is selected, display all the products
            filteredProducts = <?php echo json_encode($data); ?>;
        } else {
            // Filter the products based on the selected type
            filteredProducts = <?php echo json_encode($data); ?>.filter(product => {
                return product.Type === type;
            });
        }

        // Clear the current product display
        document.querySelector('.row').innerHTML = '';

            // Render the filtered products
            filteredProducts.forEach(product => {
                const productHTML = `
                    <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                        <div class="product">
                            <img src="${product.Picture}" alt="${product.Name}">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon mx-3">
                                <button class="edit-btn" onclick="populateEditForm(${product.ProductID}, '${product.Name}', '${product.Type}', '${product.Price}', '${product.Description}', '${product.Picture}')">
                                    <span class="fas fa-edit"></span>
                                </button>
                            </li>
                            <li class="icon mx-3">
                                <form action="index.php?controller=Product&action=deleteProduct" method="POST">
                                    <input type="hidden" name="productId" value="${product.ProductID}">
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');">
                                        <span class="fas fa-trash-alt"></span>
                                    </button>
                                </form>
                            </li>
                            </ul>
                        </div>
                        ${product.Tag && !empty(product.Tag) ? `<div class="tag bg-${product.Tag.Color}">${product.Tag.Text}</div>` : ''}
                        <div class="title pt-4 pb-1 fs-5">${product.Name}</div>
                        <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                        <div class="price fs-5">${product.Price} VND</div>
                    </div>
                `;
                document.querySelector('.row').insertAdjacentHTML('beforeend', productHTML);
            });
        });
    });

    // Search feature
        const searchInput = document.querySelector('input[type="search"]');
        searchInput.addEventListener("input", (e) => {
        const value = e.target.value.trim(); // Trim whitespace
        const normalizedValue = unorm.nfd(value.toLowerCase()); // Normalize and convert search value to lowercase
        const filteredData = <?php echo json_encode($data); ?>.filter((product) => {
            // Normalize and convert product name to lowercase
            const normalizedProductName = unorm.nfd(product.Name.toLowerCase());
            // Check if the normalized product name contains the normalized search value
            return normalizedProductName.includes(normalizedValue);
        });
        renderProducts(filteredData);
    });


    // Function to render filtered products of search feature
    function renderProducts(products) {
        const productsContainer = document.querySelector('.row');
        productsContainer.innerHTML = ''; // Clear existing products

        products.forEach(product =>
         {
            console.log(product);
            const productHTML = `
                <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                    <div class="product">
                        <img src="${product.Picture}" alt="${product.Name}">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                            <li class="icon mx-3">
                                <button class="edit-btn" onclick="populateEditForm(${product.ProductID}, '${product.Name}', '${product.Type}', '${product.Price}', '${product.Description}', '${product.Picture}')">
                                    <span class="fas fa-edit"></span>
                                </button>
                            </li>
                            <li class="icon mx-3">
                                <form action="index.php?controller=Product&action=deleteProduct" method="POST">
                                    <input type="hidden" name="productId" value="${product.ProductID}">
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');">
                                        <span class="fas fa-trash-alt"></span>
                                    </button>
                                </form>
                            </li>
                            </ul>
                    </div>
                    ${product.Tag && !empty(product.Tag) ? `<div class="tag bg-${product.Tag.Color}">${product.Tag.Text}</div>` : ''}
                    <div class="title pt-4 pb-1 fs-5">${product.Name}</div>
                    <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
                    <div class="price fs-5">${product.Price} VND</div>
                </div>
            `;
            productsContainer.insertAdjacentHTML('beforeend', productHTML);
        });
    }

    //show edit form
    function populateEditForm(productId, productName, productType, productPrice, productDescription, productImageURL) {
        // You can populate the form fields with product information here
        // For now, I'm just setting the product ID in the hidden input field

        // Set the product ID in the hidden input field
        document.getElementById('editProductId').value = productId;
        document.getElementById('editProductName').value = productName;
        document.getElementById('editProductType').value = productType;
        document.getElementById('editProductPrice').value = productPrice;
        document.getElementById('editProductDescription').value = productDescription;
        document.getElementById('editProductImageURL').value = productImageURL;
        // document.getElementById('editProductName').value = Name;

        // Show the edit form
        document.getElementById('editFormContainer').style.display = 'block';
    }

    // Function to cancel editing
    function cancelEdit() {
        // Hide the edit form
        document.getElementById('editFormContainer').style.display = 'none';
    }

    function populateAddForm() {
        // You can populate the form fields with product information here
        // For now, I'm just setting the product ID in the hidden input field

        // Set the product ID in the hidden input field
        //document.getElementById('editProductId').value = productId;
        // document.getElementById('editProductName').value = productName;
        // document.getElementById('editProductPrice').value = productPrice;
        // document.getElementById('editProductDescription').value = productDescription;
        // document.getElementById('editProductImageURL').value = productImageURL;
        // document.getElementById('editProductName').value = Name;

        // Show the edit form
        document.getElementById('addFormContainer').style.display = 'block';
    }

    // Function to cancel editing
    function cancelAdd() {
        // Hide the edit form
        document.getElementById('addFormContainer').style.display = 'none';
    }




</script>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>
</html>