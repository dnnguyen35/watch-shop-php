<?php
// session_start();
include('./config.php');
// if(isset($_SESSION['giohang'])){ echo array_sum($_SESSION['giohang']);}else{ echo 0;} 
if (!isset($_SESSION['id_user'])){
    $_SESSION['khongmuahang'] = 1;
    $_SESSION['nutchitietsp'] = 1;
    header('location: ./index.php?layout=trangchu');
    exit();
}else{

$totalAll = 0;

if (isset($_SESSION['deletesuccess'])&& $_SESSION['deletesuccess']==1){
	echo '<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: "success",
        title: "Yeahhh...",
        text: "Xoa thanh cong!!!!!",
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
});
</script>';
	unset($_SESSION['deletesuccess']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./cartcss.css">

</head>

<body>
    <div class="container" style="padding-bottom: 5rem!important;">
    <br><br>
        <h1 style="text-align: center;">Giỏ hàng</h1>
        <?php
        if (isset($_SESSION['id_user'])&&isset($_SESSION['giohang'][$_SESSION['id_user']])) {
            if (isset($_POST['sl'])) {
                foreach ($_POST['sl'] as $id_sp => $sl) {
                    if ($sl > 0) {
                        $_SESSION['giohang'][$_SESSION['id_user']][$id_sp] = $sl;
                    }
                }
            }
            $arrId = array();
            foreach ($_SESSION['giohang'][$_SESSION['id_user']] as $id_sp => $soluong) {
                $arrId[] = $id_sp;
            }
            $strId = implode(',', $arrId);
            // echo $strId;
            // $strId = substr($strId,1);
            // echo $strId; 
            $sqlgiohang = "SELECT * FROM products WHERE id IN ($strId) ORDER BY ID DESC";
            // echo $sqlgiohang;
            $querygiohang = mysqli_query($conn, $sqlgiohang);
        ?>
            <form id="capnhatgiohang" method="POST">
                <table>
                    <tr>
                        <th class="cartth" width="100">Hình ảnh</th>
                        <th class="cartth">Sản phẩm</th>
                        <th class="cartth">Giá</th>
                        <th class="cartth">Số lượng</th>
                        <th class="cartth">Tổng</th>
                        <th class="cartth">Xóa khỏi giỏ hàng</th>
                    </tr>
                    <?php
                    while ($rowgiohang = mysqli_fetch_assoc($querygiohang)) {
                        $imggiohang = "./img/" . $rowgiohang['image_url'];
                        $soluonghang = $_SESSION['giohang'][$_SESSION['id_user']][$rowgiohang['id']];
                        $totalPrice = $rowgiohang['price'] * $soluonghang;
                    ?>
                        <tr>
                            <td class="product-image"><img src="<?php echo $imggiohang; ?>" alt="Máy ảnh Canon EOS 5D Mark IV" width="50" height="50"></td>
                            <td><?php echo strtoupper($rowgiohang['name']); ?></td>
                            <td><?php echo number_format($rowgiohang['price'],0,".","."); ?> VNĐ</td>
                            <td class="quantitycart"><input name="sl[<?php echo $rowgiohang['id']; ?>]" onchange="document.getElementById('capnhatgiohang').submit();" class="cartquantity" type="number" min="1" max="<?php echo $rowgiohang['quantity']; ?>" value="<?php echo $soluonghang; ?>"></td>
                            <td><?php echo number_format($totalPrice,0,".","."); ?> VNĐ</td>
                            <td class="nutxoacart"><a href="./xoaspfromcart.php?id_sp=<?php echo $rowgiohang['id']; ?>">Xóa</a></td>
                        </tr>
                    <?php
                        $totalAll += $totalPrice;
                    }
                    ?>
                </table>
            </form>
            <p id="tieudethanhtoan" style="text-align: right;">Tổng tiền: <?php echo number_format($totalAll,0,".","."); ?> VNĐ</p>
            <?php  
            $_SESSION['totalAll'] = $totalAll;
        }else{
            echo '<p id="tieudethanhtoan" style="text-align: center;">Không còn sản phẩm nào trong giỏ hàng</p>';
        }
            ?>
            <br><br>
            <div id="nuttrongcart">
                <button class="checkout-button">
                    <a href="index.php?layout=tatcasp&id_dm=0" style="text-decoration:none; color:white;">Tiếp tục mua</a>
                </button>
                <a href="./xoaspfromcart.php?id_sp=0" class="checkout-button" style="text-decoration:none; color:white;">Xóa hết hàng</a>
                <?php if(isset($_SESSION['giohang'][$_SESSION['id_user']])&&isset($_SESSION['id_user'])){
                 echo '<a href="./index.php?layout=thanhtoan" class="checkout-button" style="text-decoration:none;">Thanh toán</a>';
                }
                ?>
                
                
            </div>
    </div>
</body>
<?php
 }
?>

</html>
