<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">

<?php
require('View/admin/layouts/navbar.php');
// print_r($data)
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
        <a class="navbar-brand text-uppercase fw-800" href="#"><span class="border-red pe-2">New Product</span></a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="fas fa-bars"></span> 
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="myNav">
            <div class="navbar-nav"> 
                <a class="nav-link active fs-5" aria-current="page" href="#">Tất cả</a> 
                <a class="nav-link fs-5" href="#">Cơm</a> 
                <a class="nav-link fs-5" href="#">Bún</a> 
                <a class="nav-link fs-5" href="#">Lẩu</a> 
                <a class="nav-link fs-5" href="#">Nước uống</a> 
                <!-- Add the search form -->
            </div>
        </div>
        <form class="d-flex ms-3">
            <input class="form-control me-2" type="search" placeholder="Nhập ..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
        </form>
    </div>
</nav>
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://cdn.tgdd.vn/2022/01/CookDish/cach-lam-com-ga-chien-xoi-mo-ngon-da-vang-gion-rum-dom-gian-avt-1200x676.jpg" alt="Cơm gà xối mỡ">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-red">sale</div>
            <div class="title pt-4 pb-1 fs-5">Cơm Gà Xối Mỡ</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">25.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://file.hstatic.net/200000459373/article/9e460b450dc12519d2f0ef143819831f_8f3645a6459041489c05eb2ddf08b530.jpg" alt="Cơm Chiên Dương Châu">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-red">Sale</div>
            <div class="title pt-4 pb-1 fs-5">Cơm Chiên Dương Châu</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">25.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://cdn.tgdd.vn/Files/2017/03/24/964440/cach-lam-bun-thit-nuong-ngon-7_760x450.jpg" alt="Bún thịt nướng">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-green">new</div>
            <div class="title pt-4 pb-1 fs-5"> Bún Thịt Nướng</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">20.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://statics.vinwonders.com/bun-cha-ha-noi-3_1688011791.jpg" alt="Bún chả hà nội">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="title pt-4 pb-1 fs-5">Bún Chả Hà Nội</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5"> 30.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://hoasenfoods.vn/wp-content/uploads/2024/01/bun-bo-hue.jpg" alt="Bún bò huế">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-red">sale</div>
            <div class="title pt-4 pb-1 fs-5">Bún Bò Huế</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">30.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://tiki.vn/blog/wp-content/uploads/2023/07/thumb.jpeg" alt="Bún riêu cua">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-black">out of stock</div>
            <div class="title pt-4 pb-1 fs-5">Bún Riêu Cua</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">30.000 VND</div>
            <button class="btn btn-primary mt-3">Mua Ngay</button>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://cdn.tgdd.vn/Files/2019/07/15/1179640/that-chat-tinh-anh-em-voi-mon-lau-hai-san-bang-goi-lau-sg-food-202202231324352858.jpg" alt="Lẩu hải sản">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="title pt-4 pb-1 fs-5"> Lẩu Hải Sản</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">50.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://cdn.sgtiepthi.vn/wp-content/uploads/2020/12/T7_laumuc_thuanphucvungtau.jpg" alt="Lẩu mực">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-green">new</div>
            <div class="title pt-4 pb-1 fs-5">Lẩu mực</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price fs-5">50.000 VND</div>
            <button class="btn btn-primary mt-3">Mua ngay</button>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">1 <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>
</html>