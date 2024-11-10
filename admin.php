<?php
session_start();
if(!isset($_SESSION['adminname'])){
    header('location: ./loginadmin.php');
}else{
$tmplayoutadmin ="";
if (isset($_GET["adminlayout"])) {
    switch ($_GET["adminlayout"]) {
        case 'admintrangchu':
            include_once('./admintrangchu.php');
            break;
        case 'adminnguoidung':
            include_once('./adminuser.php');
            break;
        case 'adminsanpham':
            include_once('./adminsanpham.php');
            break;
        case 'admindanhmuc':
            include_once('./admindanhmuc.php');
            break;
        case 'adminhoadon':
            include_once('./product.php');
            break;
        case 'adminchitiethoadon':
            include_once('./product.php');
            break;
        case 'themsp':
            include_once('./adminaddsanpham.php');
            break;
        case 'themdanhmuc':
            include_once('./adminadddanhmuc.php');
            break;
        case 'suadanhmuc':
            include_once('./adminsuadanhmuc.php');
            break;
        case 'suasp':
            include_once('./adminsuasanpham.php');
            break;
        case 'themadmin':
            include_once('./themAdmin.php');
            break;
        case 'quanlydonhang':
             include_once('./adminhoadon.php');
            break;
        case 'capnhatdonhang':
            include_once('./admincapnhatdonhang.php');
            break;
        case 'adminchitietdonhang':
            include_once('./adminchitietdonhang.php');
            break;
    }
} else {
    $tmplayoutadmin = "admintrangchu";
    include_once('./admintrangchu.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="./admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
</style>

<body>

    <div class="top">
                <div class="sidebar">
                    <div class="user">
                        <div class="user_avatar">
                            <i class="fa-solid fa-user fa-2x"></i>
                        </div>
                        <div>
                            <div class="user_name">
                                <b>Admin</b>
                            </div>
                            <div class="user_designation">
                                <p>Chào mừng quay trở lại</p>
                                <br>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="menu">
                        <a href="./admin.php?adminlayout=admintrangchu">
                            <li class="menu_item <?php if(isset($_GET["adminlayout"]) && $_GET["adminlayout"]=="admintrangchu") { echo "active"; }else if($tmplayoutadmin == 'admintrangchu'){ echo "active"; } ?> "><i class="fas fa-house"></i>Trang chủ</li>
                        </a>
                        <a href="./admin.php?adminlayout=adminnguoidung">
                            <li class="menu_item <?php if(isset($_GET["adminlayout"]) && $_GET["adminlayout"]=="adminnguoidung") { echo "active"; } ?> "><i class="fas fa-tag"></i>Quản lý người dùng</li>
                        </a>
                        <a href="./admin.php?adminlayout=adminsanpham">
                            <li class="menu_item <?php if(isset($_GET["adminlayout"]) && $_GET["adminlayout"]=="adminsanpham") { echo "active"; } ?>"><i class="fas fa-bag-shopping"></i>Quản lý sản phẩm</li>
                        </a>
                        <a href="./admin.php?adminlayout=admindanhmuc">
                            <li class="menu_item <?php if(isset($_GET["adminlayout"]) && $_GET["adminlayout"]=="admindanhmuc") { echo "active"; } ?>"><i class="fas fa-bag-shopping"></i>Quản lý danh muc</li>
                        </a>
                        <a href="./admin.php?adminlayout=quanlydonhang">
                            <li class="menu_item <?php if(isset($_GET["adminlayout"]) && $_GET["adminlayout"]=="quanlydonhang") { echo "active"; } ?>"><i class="fas fa-address-card"></i>Quản lý hóa đơn</li>
                        </a>
                    </div>
                </div>
            </div>
	</div>
	<div class="sign_out">
            <a href="./logoutadmin.php"><i class="fas fa-right-from-bracket"></i></a>
        </div>
    </div>
    <?php
    }
    ?>
    
</body>

</html>
