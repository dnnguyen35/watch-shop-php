<?php
// session_start();
include('./config.php');
$totalAll = 0;
$hovaten = "";
$email = "";
$sodienthoai = "";
$hinhthucthanhtoan = "";
$diachigiao = "";
$tinhthanh = "";
$quanhuyen = "";
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
        <h1 style="text-align: center;">Chi tiết đơn hàng</h1>
        <?php
        if (isset($_SESSION['id_user'])) {
            $order_id = $_GET['order_id'];
            $sqlgiohang = "SELECT o.*, od.price as price, od.quantity as quantity, od.total_price as totalprice, p.image_url as product_image, p.name as product_name
            FROM orders o
            INNER JOIN order_details od ON o.id = od.order_id
            INNER JOIN products p ON od.product_id = p.id
            WHERE o.id = '$order_id'
            ORDER BY p.id ASC";
            $querygiohang = mysqli_query($conn, $sqlgiohang);
        ?>
            <table>
                <tr>
                    <th class="cartth" width="100">Hình ảnh</th>
                    <th class="cartth">Sản phẩm</th>
                    <th class="cartth">Giá</th>
                    <th class="cartth">Số lượng</th>
                    <th class="cartth">Tổng</th>

                </tr>
                <?php

                while ($rowgiohang = mysqli_fetch_assoc($querygiohang)) {
                    $imggiohang = "./img/" . $rowgiohang['product_image'];
                ?>
                    <tr>
                        <td class="product-image"><img src="<?php echo $imggiohang; ?>" width="50" height="50"></td>
                        <td><?php echo strtoupper($rowgiohang['product_name']); ?></td>
                        <td><?php echo number_format($rowgiohang['price'],0,".","."); ?> VNĐ</td>
                        <td class="quantitycart"><input class="cartquantity" type="number" value="<?php echo $rowgiohang['quantity']; ?>" readonly></td>
                        <td><?php echo number_format($rowgiohang['totalprice'],0,".","."); ?> VNĐ</td>
                    </tr>
                <?php
                    $totalAll =  $rowgiohang['total_price'];
                    $hovaten = $rowgiohang['customer_name'];
                    $email = $rowgiohang['customer_email'];
                    $sodienthoai = $rowgiohang['customer_phone_number'];
                    $hinhthucthanhtoan = $rowgiohang['pay_method'];
                    $diachigiao = $rowgiohang['customer_address'];
                    $tinhthanh = $rowgiohang['city'];
                    $quanhuyen = $rowgiohang['district'];
                }
                ?>
            </table>
            <p id="tieudethanhtoan" style="text-align: right;">Tổng tiền: <?php echo number_format($totalAll,0,".","."); ?> VNĐ</p>
        <?php
        } else {
            echo '<p id="tieudethanhtoan" style="text-align: center;">Khong co san pham trong gio hang</p>';
        }
        ?>
        <!-- Thêm form ở đây -->
        <div id="divformthanhtoan">
            <form action="#" method="post" id="formthanhtoan">
                <div id="labelthongtin">
                    <P class="left">Họ và tên:</P>
                    <P class="left">Email:</P>
                    <P class="left">Số điện thoại:</P>
                    <P class="left">Hình thức thanh toán:</P>
                    <P class="left">Dia chi giao:</P>
                    <p class="left">Tỉnh thành</p>
                    <p class="left">Quận huyện</p>

                </div>

                <div id="inputthanhtoan">
                    <input class="right" type="text" id="fullName" value="<?php echo $hovaten; ?>"></br>
                    <input class="right" type="email" id="email" value="<?php echo $email; ?>"></br>
                    <input class="right" type="tel" id="phone" value="<?php echo $sodienthoai; ?>"></br>
                    <input class="right" type="text" id="fullName" value="<?php echo $hinhthucthanhtoan; ?>"></br>
                    <input class="right" type="text" id="fullName" value="<?php echo $diachigiao; ?>"></br>
                    <input class="right" type="text" id="fullName" value="<?php echo $tinhthanh; ?>"></br>
                    <input class="right" type="text" id="fullName" value="<?php echo $quanhuyen; ?>"></br>
                </div>
            </form>
        </div>
        <div id="nuttrongcart">
            <button class="checkout-button"><a href="./index.php?layout=showdonhang" style="color:white; text-decoration:none;">Trở lại trang hóa đơn</a></button>
        </div>
    </div>
</body>

</html>