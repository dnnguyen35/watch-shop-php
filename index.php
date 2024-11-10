<?php
session_start();

$tmplayout;
if (isset($_GET["layout"])) {
    $tmplayout = "";
    switch ($_GET["layout"]) {
        case 'trangchu':
            include_once('./index2.php');
            break;
        case 'khuyenmai':
            include_once('./discount.php');
            break;
        case 'gioithieu':
            include_once('./aboutus.php');
            break;
        case 'lienhe':
            include_once('./contact.php');
            break;
        case 'tatcasp':
            include_once('./product.php');
            break;
        case 'giohang':
            include_once('./cart.php');
            break;
        case 'chitietsp':
            include_once('./chitietsp.php');
            break;
        case 'thanhtoan':
            include_once('./thanhtoan.php');
            break;
        case 'thongtinuser':
            include_once('./taikhoanuser.php');
            break;
        case 'showdonhang':
            include_once('./showdonhang.php');
            break;
        case 'chitietdonhang':
            include_once('./chitietdonhang.php');
            break;
        case 'thankyou':
            include_once('./thankyou.php');
            break;
    }
} else {
    $tmplayout = "trangchu";
    include_once('./index2.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./minhson.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <link rel="stylesheet" href="./fontawesome-free-6.2.1-web/css/all.min.css">
    <title>Hello World</title>
</head>

<body>
    <!-- Start nav-bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a href="./index.php?layout=trangchu" class="navbar-brand d-flex justify-content-between ">
                <h6 style="color: red;">WatchShop</h6>
            </a>
            <div class="order-lg-2">
                <form method="POST" action="./index.php?layout=tatcasp" class="btn position-relative" id="search-box">
                    <input name="tukhoa" type="text" id="input" class="search_box" placeholder="Tim kiem o day nha">
                    <button name="nuttimkiem" class="btn position-relative" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <!-- <button type="button" class="btn position-relative">
                    <a href="#" title="Bạn cần đăng nhập để mua sắm">
                        <i class="fa-solid fa-cart-shopping" style="color: black;"></i>
                    </a>
                </button> -->
                <a href="#" title="Đăng nhập/Đăng kí tài khoản" style="text-decoration:none;">
                    <!-- <button type="button" class="btn position-relative">
                        <i class="fa-solid fa-user" style="color: black;"></i>
                    </button> -->
                    <span><?php if(isset($_SESSION['username'])&&isset($_SESSION['id_user'])){ echo '<a href="index.php?layout=thongtinuser">'.$_SESSION['username'].'</a>'; echo '   '.'<a href="logoutuser.php"><i class="fas fa-sign-out-alt"></i></a>' ;
                                                                                             }else{
                                                                                                echo '<button style="border: 5px; border-radius:5px;"> <a style="text-decoration:none; margin: 10px;" href="loginuser.php">Đăng nhập</a></button>';
                                                                                             }
                                                                                             ?></span>
                </a>

            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a <?php if (isset($_GET["layout"]) && $_GET["layout"] == 'trangchu') {
                                echo 'style="color: blue;"';
                            } else if ($tmplayout == 'trangchu') {
                                echo 'style="color: blue;"';
                            } ?> class="nav-link" href="./index.php?layout=trangchu">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown px-2 py-2">
                        <a <?php if (isset($_GET["layout"]) && $_GET["layout"] == 'tatcasp') {
                                echo 'style="color: blue;"';
                            } ?> class="nav-link" href="./index.php?layout=tatcasp&id_dm=0" id="navbarDropdown" role="button">
                            Sản phẩm
                        </a>

                    </li>
                    <li class="nav-item px-2 py-2">
                        <a <?php if (isset($_GET["layout"]) && $_GET["layout"] == 'khuyenmai') {
                                echo 'style="color: blue;"';
                            } ?> class="nav-link" href="./index.php?layout=khuyenmai">Khuyến mãi</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a <?php if (isset($_GET["layout"]) && $_GET["layout"] == 'gioithieu') {
                                echo 'style="color: blue;"';
                            } ?> class="nav-link" href="./index.php?layout=gioithieu ">Giới thiệu</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a <?php if (isset($_GET["layout"]) && $_GET["layout"] == 'lienhe') {
                                echo 'style="color: blue;"';
                            } ?> class="nav-link" href="./index.php?layout=lienhe ">Liên hệ</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a <?php if (isset($_GET["layout"]) && $_GET["layout"] == 'giohang') {
                                echo 'style="color: blue;"';
                            } ?> class="nav-link" href="./index.php?layout=giohang">Giỏ hàng(<?php if (isset($_SESSION['id_user'])&&isset($_SESSION['giohang'][$_SESSION['id_user']])) {
                                                                                                    echo array_sum($_SESSION['giohang'][$_SESSION['id_user']]);
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                }  ?>)</a>
                        <!-- <span>()</span> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End nav-bar -->



    <!-- Start header -->

    <!-- End header -->


    <!-- End contact -->

    <!-- Start footer -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row text-white g-4">
                <div class="col-md-6 col-lg-4">
                    <a href="index.html" class="text-uppercase text-decoration-none brand text-white">Watchshop</a>
                    <p class="text-white text-muted mt-3">Sử dụng tốt nhất trên trình duyệt Chrome</p>
                </div>
                <!-- <div class="col-md-6 col-lg-4">
                    <h5 class="fw-light">Đường dẫn</h5>
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Trang chủ
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Sản phẩm
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Liên hệ
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Giới thiệu
                            </a>
                        </li>
                    </ul>
                </div> -->

                <div class="col-md-6 col-lg-4">
                    <h5 class="fw-light mb-3">Địa chỉ</h5>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                        <span class="fw-light">
                            273 An D. Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="fw-light">
                            duongminhson007@gmail.com
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="fw-light">
                            +0923686290
                        </span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h5 class="fw-light mb-3">Theo dõi chúng tôi qua</h5>
                    <div>
                        <ul class="list-unstyled d-flex">
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100012773887834" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/c/K%C3%AAnh%C4%90%E1%BB%93ngH%E1%BB%93H%E1%BA%A3iTri%E1%BB%81u" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->
    <script src="./js/jquery-3.6.1.js"></script>
    <script src="./js/isotope.pkgd.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</body>

</html>
