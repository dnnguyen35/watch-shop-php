<?php

include('./config.php');
// $_SESSION['tukhoachinhthuc'] = "";
$is_active = false;
$tukhoatimkiem = "";
$tukhoachinhthuc = "";
$arr_tukhoa = "";
$iddm = "";
if (isset($_GET['id_dm'])) {
    $iddm = $_GET['id_dm'];
}
if ($iddm != 0 && $iddm != "" && !isset($_POST['nuttimkiemnangcao'])) {
    $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.category_id='$iddm' AND products.isshow='0' ORDER BY products.id DESC";
    $queryshowsp = mysqli_query($conn, $sqlshowsp);
} else if (isset($_POST['nuttimkiem'])) {
    $tukhoatimkiem = $_POST['tukhoa'];
    $tukhoachinhthuc = trim($tukhoatimkiem);
    $arr_tukhoa = explode(' ', $tukhoachinhthuc);
    $tukhoachinhthuc = implode('%', $arr_tukhoa);
    $tukhoachinhthuc = '%' . $tukhoachinhthuc . '%';
    $_SESSION['tukhoachinhthuc'] = $tukhoachinhthuc;
    $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.name LIKE ('$tukhoachinhthuc') AND products.isshow='0' ORDER BY products.id DESC";
    $queryshowsp = mysqli_query($conn, $sqlshowsp);
} else if (isset($_POST['nuttimkiemnangcao'])) {
    // $locgia = $_POST['locgiatien'];
    $locgia = 'caodenthap';	
    $tukhoachinhthuc = isset($_SESSION['tukhoachinhthuc'])? $_SESSION['tukhoachinhthuc']:"";

    if ($locgia == 'thapdencao') {
        if ($iddm == 0) {
            $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.isshow='0' ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        } else if ($iddm == "") {
            $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.name LIKE ('$tukhoachinhthuc') AND products.isshow='0' ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        } else {
            $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.category_id='$iddm' AND products.isshow='0' ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }
    } else if($locgia == 'caodenthap') {
        if ($iddm == 0) {
            $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.isshow='0' ORDER BY products.price DESC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        } else if ($iddm == "") {
            $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.name LIKE ('$tukhoachinhthuc') AND products.isshow='0' ORDER BY products.price DESC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }else {
            $sqlshowsp = "SELECT *,products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.category_id='$iddm' AND products.isshow='0' ORDER BY products.price DESC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }
    } else if($locgia == '500-1000') {
        if ($iddm == 0) {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.isshow='0' AND products.price BETWEEN 500000 AND 1000000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        } else if ($iddm == "") {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.name LIKE ('$tukhoachinhthuc') AND products.isshow='0' AND products.price BETWEEN 500000 AND 1000000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }else {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.category_id='$iddm' AND products.isshow='0'  AND products.price BETWEEN 500000 AND 1000000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }
    } else if($locgia == '1000-1500') {
        if ($iddm == 0) {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.isshow='0' AND products.price BETWEEN 1000000 AND 1500000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        } else if ($iddm == "") {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.name LIKE ('$tukhoachinhthuc') AND products.isshow='0' AND products.price BETWEEN 1000000 AND 1500000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }else {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.category_id='$iddm' AND products.isshow='0' AND products.price BETWEEN 1000000 AND 1500000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }
    } else if($locgia == '1500-...') {
        if ($iddm == 0) {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.isshow='0' AND products.price >= 1500000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        } else if ($iddm == "") {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.name LIKE ('$tukhoachinhthuc') AND products.isshow='0' AND products.price >= 1500000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }else {
            $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE products.category_id='$iddm' AND products.isshow='0' AND products.price >= 1500000 ORDER BY products.price ASC";
            $queryshowsp = mysqli_query($conn, $sqlshowsp);
        }
    }
} else {

    $sqlshowsp = "SELECT *, products.id AS id_products FROM categories INNER JOIN products ON products.category_id=categories.id WHERE categories.status='1' AND products.isshow='0' ORDER BY products.id DESC";
    $queryshowsp = mysqli_query($conn, $sqlshowsp);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./product.css">
    <link rel="stylesheet" href="./style.css">
    
    <link rel="stylesheet" href="./fontawesome-free-6.2.1-web/css/all.min.css">
    <title>Sản phẩm</title>
</head>

<body>



    <div class="container" id="ct" style="padding-bottom: 5rem!important;">
        <div class="category row">
            <div class="col-lg-2 category-left ">
                <h4 class="category-heading">Thương hiệu</h4>
                <ul class="category-list">
                    <li class="category-item">
                        <a <?php if (isset($_GET["id_dm"]) && $_GET["id_dm"] == 0) {
                                echo 'style="color: blue;"';
                            } ?> href="./index.php?layout=tatcasp&id_dm=0" class="category-link">Tất cả</a>
                    </li>
                    <?php
                    $sql1 = "select * from categories where status='1'";
                    $result1 = mysqli_query($conn, $sql1);


                    while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                        <li class="category-item">
                            <a <?php if (isset($_GET["id_dm"]) && $_GET["id_dm"] == $row1['id']) {
                                    echo 'style="color: blue;"';
                                } ?> href="./index.php?layout=tatcasp&id_dm=<?php echo $row1['id']; ?>" class="category-link "><?php echo strtoupper($row1['name']); ?> </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-10 category-right">
		<div class="home-filter mt-4">
                    <form action="./index.php?layout=tatcasp<?php if (isset($_GET["id_dm"])) echo '&id_dm=' . $_GET["id_dm"]; ?>" method="POST">
                        <select name="locgiatien" id="" class="input-select border_select">
                            <option value="thapdencao" selected>Thấp đến cao</option>
                            <option value="caodenthap">Cao đến thấp</option>
                            <!-- <option value="500-1000">500.000-1.000.000</option>
                            <option value="1000-1500">1.000.000-1.500.000</option>
                            <option value="1500-...">1.500.000-10.000.000</option> -->
                        </select>
                        <button name="nuttimkiemnangcao" style="border-radius: 7px!important; border: solid #0d6efd 3px !important; padding:0 2px">Tìm kiếm</button>
                    </form>
                </div>
		<div class="row">
                    <div class="cont">
                        <div class="container-fluid row">
                            <?php
                            if(mysqli_num_rows($queryshowsp)>0){
                            while ($rowshowsp = mysqli_fetch_assoc($queryshowsp)) {
                                $linkimg = "./img/" . $rowshowsp['image_url'];

                                echo '
                        <div class="single-item col-lg-3 col-md-4">
                        <a href="#" class="info" >
                            <div class="collection-img position-relative overflow-hidden">
                                <img src="' . $linkimg . '" class="w-100">
                                
                                <span class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">Mới</span>
                            </div>
                            <div class="text-center">
                            <p class="">' . $rowshowsp['name'] . '</p>
                            <span class="fw-bold d-block">' . number_format($rowshowsp['price'], 0, ".", ".") . ' VNĐ</span>
                            <a href="./index.php?layout=chitietsp&id_sp=' . $rowshowsp['id_products'] . '" class="btn mt-3 add_btn" id="btnc">Xem chi tiết</a>
                            </div>  
                        </a>
                        </div>';
                            }
                        }else{
                            echo '<p id="tieudethanhtoan" style="text-align: center;">"Không có sản phẩm vừa tìm"</p>';
                        }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.6.1.js"></script>
    <script src="js/search.js"></script>
    <script src="js/pagination.js"></script>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
