<?php
include('./config.php');
$idsp = "";
if (isset($_GET['id_sp'])) {
    $idsp = $_GET['id_sp'];
}
$sqlchitietsp = "SELECT products.id,products.name,products.description,products.image_url,products.price,products.quantity,categories.name as category_name FROM products INNER JOIN categories ON products.category_id=categories.id WHERE products.id='$idsp'  ";
$querychitietsp = mysqli_query($conn, $sqlchitietsp);

if (isset($_SESSION['addsuccess'])&& $_SESSION['addsuccess']==1){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Yeahhh...",
        text: "Them thanh cong!!!!!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['addsuccess']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./chitietsp.css">
    <!-- <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.min.css"> -->
    <link rel="icon" href="icon_giohang.png" type="image/x-icon" />
    <title>Chi tiết</title>
</head>
<div id="container_chitietsp">
    <!--Sản phẩm-->
    <?php
        while($rowchitietsp = mysqli_fetch_assoc($querychitietsp)){
            $linkimgchitietsp = "./img/" . $rowchitietsp['image_url'];
        ?>
    <div class="container_ctsp">
        <div class="anhchitiet_sp">
            <img src="<?php echo $linkimgchitietsp; ?>" alt="" style="width:485px ;">
        </div>
        <div class="thongtinchitiet_sp">
            <h5 style="margin: 26px 0 10px 0;"><?php echo strtoupper($rowchitietsp['name']); ?></h5>
            <h5 style="color: rgb(172, 43, 54);"><?php echo number_format($rowchitietsp['price'],0,".",".");?> VNĐ</h5>
            <div class="uudai_sp">
                <div class="con_hang">
                    <h6 style="margin: 0 0 10px 0;"><?php if($rowchitietsp['quantity']<1){ echo 'Hết hàng';}else { echo 'Còn hàng';} ?></h6>
                </div>
                <div class="box_uudai">
                    <p class="uudai_content">Ưu đãi</p>
                    <p style="padding-right:20px;">Gói quà miễn phí khi mua trực tiếp ở các chi nhánh WatchShop</p>
                </div>
            </div>
            <div class="btn_buy">
                <a href="./index.php?layout=tatcasp&id_dm=0" class="btn mt-3 add_btn" id="btnc">Trở lại</a> 
                <?php
                if($rowchitietsp['quantity']>=1){ 
                 echo '<a href="./addsptocart.php?id_sp='.$rowchitietsp['id'].'" class="btn mt-3 add_btn" id="btnc">Thêm vào giỏ</a>'; 
                }
                ?>       
            </div>
            <div class="free_ship">
                <h6>*Miễn phí giao hàng tận nhà hoặc nhận tại cửa hàng</h6>
            </div>
            <div class="tuvan_hotro">
                <div class="call_now">
                    <p>Tư vấn ngay: <span><a href="tel:1800-545457">1800-545457</a></span> (miễn phí)</p>
                </div>
                <div class="call_now_or">
                    <p>Hoặc qua: </p>
                    <a href="#">
                        <img src="https://cdn.pnj.io/images/image-update/2021/hotline/icon-zalo.svg" alt="Zalo">
                    </a>
                    <a href="#">
                        <img src="https://cdn.pnj.io/images/image-update/2021/hotline/icon-facebook.svg" alt="Mess">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--Chi tiết sản phẩm-->

    <div class="container_ttchitiet">
        <div class="header_ttchitiet">
            <h5>Mô tả sản phẩm</h5>
        </div>
        <hr>
        <div class="box_ttchitiet">
            <div>
                <p>Thương hiệu: <?php echo strtoupper($rowchitietsp['category_name']); ?></p>
            </div>
            <div class="row_tt">
                <p>Mô tả: <?php echo ucfirst($rowchitietsp['description']); ?></p>
            </div>
            <div>
                <p>Giá bán chính thức: <?php echo number_format($rowchitietsp['price'],0,".","."); ?> VND</p>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
</body>

</html>
