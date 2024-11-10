<?php
// session_start();
include('./config.php');
// if(isset($_SESSION['giohang'])){ echo array_sum($_SESSION['giohang']);}else{ echo 0;} 
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
        <h1 style="text-align: center;">Tất cả các đơn đã mua</h1>
        <?php
        if (isset($_SESSION['id_user'])) {
            // $arrId = array();
            // foreach ($_SESSION['giohang'][$_SESSION['id_user']] as $id_sp => $soluong) {
            //     $arrId[] = $id_sp;
            // }
            // $strId = implode(',', $arrId);
            // echo $strId;
            // $strId = substr($strId,1);
            // echo $strId; 
            $user_id = $_SESSION['id_user'];
            $sqldonhang = "SELECT orders.*, SUM(order_details.quantity) AS total_quantity 
            FROM orders 
            INNER JOIN order_details ON orders.id = order_details.order_id 
            WHERE orders.user_id = '$user_id' 
            GROUP BY orders.id 
            ORDER BY orders.id ASC";

            $querydonhang = mysqli_query($conn, $sqldonhang);
            if (mysqli_num_rows($querydonhang) != 0) {
        ?>
                <!-- <form id="capnhatgiohang" method="POST"> -->
                <table>
                    <tr>
                        <th class="cartth">Khách hàng</th>
                        <th class="cartth">Email</th>
                        <th class="cartth">Số lượng</th>
                        <th class="cartth">Tổng</th>
                        <th class="cartth">Ngay mua</th>
                        <th class="cartth">Chi tiết</th>
                    </tr>
                    <?php
                    while ($rowgiohang = mysqli_fetch_assoc($querydonhang)) {
                    ?>
                        <tr>
                            <td><?php echo $rowgiohang['customer_name']; ?></td>
                            <td><?php echo $rowgiohang['customer_email']; ?></td>
                            <td class="quantitycart"><input type="number" class="cartquantity" value="<?php echo $rowgiohang['total_quantity']; ?>" readonly></td>
                            <td><?php echo number_format($rowgiohang['total_price'], 0, ".", "."); ?> VNĐ</td>
                            <td><?php echo date('Y-m-d', strtotime($rowgiohang['created_at'])); ?></td>
                            <td><a href="./index.php?layout=chitietdonhang&order_id=<?php echo $rowgiohang['id']; ?>">Chi tiết</a></td>
                        </tr>
                <?php

                    }
                } else {
                    echo '<p id="tieudethanhtoan" style="text-align: center;">Chưa có đơn hàng nào được mua</p>';
                }
                ?>
                </table>
                <!-- </form> -->
            <?php
        }
            ?>
            <div id="nuttrongcart">
                <button class="checkout-button"><a href="./index.php?layout=thongtinuser" style="color:white; text-decoration:none;">Trở lại trang tài khoản</a></button>
            </div>
    </div>
</body>

</html>